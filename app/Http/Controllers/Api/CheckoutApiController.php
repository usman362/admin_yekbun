<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ZercashSetting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutApiController extends Controller
{
    /**
     * POST /api/checkout/prepare
     * Validate cart, calculate totals, and prepare checkout session.
     *
     * Payload: {
     *   items: [...],
     *   shipping: { firstName, lastName, email, phone, address, city, state, zip },
     *   subtotal, tax, total
     * }
     */
    public function prepare(Request $request)
    {
        $request->validate([
            'shipping' => 'required|array',
            'shipping.firstName' => 'required|string|max:100',
            'shipping.lastName' => 'required|string|max:100',
            'shipping.email' => 'required|email',
            'shipping.phone' => 'required|string|max:30',
            'shipping.address' => 'required|string|max:500',
            'shipping.city' => 'required|string|max:100',
            'shipping.state' => 'required|string|max:100',
            'shipping.zip' => 'required|string|max:20',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not found.', false, 404);
        }

        // Fetch cart items from DB
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            // If frontend sent items directly, use those
            if ($request->has('items') && count($request->items) > 0) {
                $items = $request->items;
            } else {
                return ResponseHelper::sendResponse([], 'Cart is empty.', false, 400);
            }
        } else {
            $items = $cartItems->map(function ($item) {
                return [
                    'id' => $item->_id,
                    'title' => $item->title,
                    'subtitle' => $item->subtitle ?? '',
                    'price' => (float) ($item->price ?? 0),
                    'quantity' => (int) ($item->quantity ?? 1),
                ];
            })->toArray();
        }

        // Calculate totals
        $subtotal = collect($items)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        });

        // Get cashback from settings
        $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();
        $cashbackPercent = $setting->transaction_fee_percent ?? 5;
        $cashback = round($subtotal * ($cashbackPercent / 100), 2);

        $tax = $request->tax ?? round($subtotal * 0.10, 2); // 10% default tax
        $total = round($subtotal + $tax - $cashback, 2);

        $checkoutData = [
            'user_id' => Auth::id(),
            'items' => $items,
            'shipping' => $request->shipping,
            'subtotal' => $subtotal,
            'cashback' => $cashback,
            'cashback_percent' => $cashbackPercent,
            'tax' => $tax,
            'total' => $total,
            'prepared_at' => Carbon::now()->toIso8601String(),
        ];

        return ResponseHelper::sendResponse($checkoutData, 'Checkout prepared successfully.');
    }

    /**
     * POST /api/checkout/pay
     * Process payment and create order + transaction + invoice.
     *
     * Payload: {
     *   checkout: { items, shipping, subtotal, tax, total, cashback },
     *   payment_method: 'card' | 'paypal' | 'bank'
     * }
     */
    public function pay(Request $request)
    {
        $request->validate([
            'checkout' => 'required|array',
            'payment_method' => 'required|string|in:card,paypal,bank',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not found.', false, 404);
        }

        $checkout = $request->checkout;

        try {
            // 1. Create Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => Order::generateOrderNumber(),
                'items' => $checkout['items'] ?? [],
                'shipping' => $checkout['shipping'] ?? [],
                'subtotal' => (float) ($checkout['subtotal'] ?? 0),
                'tax' => (float) ($checkout['tax'] ?? 0),
                'total' => (float) ($checkout['total'] ?? 0),
                'cashback' => (float) ($checkout['cashback'] ?? 0),
                'payment_method' => $request->payment_method,
                'payment_status' => 'completed',
                'order_status' => 'confirmed',
            ]);

            // 2. Create Transaction
            $transactionId = 'YK' . mt_rand(100000000, 999999999);
            $transaction = new Transaction();
            $transaction->tId = $transactionId;
            $transaction->amount = $checkout['total'] ?? 0;
            $transaction->status = 'COMPLETED';
            $transaction->subscription_type = 'one_time';
            $transaction->transaction_type = 'purchase';
            $transaction->userType = $user->user_type ?? 'cultivated';
            $transaction->user_id = Auth::id();
            $transaction->order_id = $order->_id;
            $transaction->payment_method = $request->payment_method;
            $transaction->date = Carbon::now()->format('Y-m-d');
            $transaction->save();

            // 3. Create Invoice
            $invoice = new Invoice();
            $invoice->user_id = $user->_id;
            $invoice->first_name = $checkout['shipping']['firstName'] ?? $user->name;
            $invoice->last_name = $checkout['shipping']['lastName'] ?? $user->last_name;
            $invoice->email = $checkout['shipping']['email'] ?? $user->email;
            $invoice->phone = $checkout['shipping']['phone'] ?? '';
            $invoice->address = $checkout['shipping']['address'] ?? '';
            $invoice->city = $checkout['shipping']['city'] ?? $user->city;
            $invoice->country = $checkout['shipping']['state'] ?? $user->country;
            $invoice->transaction_id = $transactionId;
            $invoice->order_id = $order->_id;
            $invoice->status = 'COMPLETED';
            $invoice->date = Carbon::now();
            $invoice->transaction_type = 'purchase';
            $invoice->invoice_id = $this->generateInvoiceId();
            $invoice->items = $checkout['items'] ?? [];
            $invoice->subtotal = $checkout['subtotal'] ?? 0;
            $invoice->tax = $checkout['tax'] ?? 0;
            $invoice->total = $checkout['total'] ?? 0;
            $invoice->cashback = $checkout['cashback'] ?? 0;
            $invoice->save();

            // 4. Clear cart
            Cart::where('user_id', Auth::id())->delete();

            // 5. Apply cashback to wallet if applicable
            if (($checkout['cashback'] ?? 0) > 0) {
                $user->wallet_balance = ($user->wallet_balance ?? 0) + ($checkout['cashback'] ?? 0);
                $user->save();
            }

            return ResponseHelper::sendResponse([
                'order' => $order,
                'transaction_id' => $transactionId,
                'invoice_id' => $invoice->invoice_id,
                'message' => 'Payment processed successfully.',
            ], 'Payment successful!');

        } catch (Exception $e) {
            return ResponseHelper::sendResponse(
                ['error' => $e->getMessage()],
                'Payment processing failed.',
                false,
                500
            );
        }
    }

    /**
     * GET /api/orders
     * Fetch user's order history.
     */
    public function orders(Request $request)
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('limit', 20));

        return ResponseHelper::sendResponse($orders, 'Orders fetched successfully.');
    }

    /**
     * GET /api/orders/{id}
     * Fetch a specific order's details.
     */
    public function orderDetail($id)
    {
        $order = Order::where('_id', $id)->where('user_id', Auth::id())->first();

        if (!$order) {
            return ResponseHelper::sendResponse([], 'Order not found.', false, 404);
        }

        return ResponseHelper::sendResponse($order, 'Order fetched successfully.');
    }

    private function generateInvoiceId()
    {
        $lastInvoice = Invoice::orderBy('created_at', 'desc')->first();

        if (!$lastInvoice || empty($lastInvoice->invoice_id)) {
            return 'INV-1001';
        }

        $lastNumber = (int) str_replace('INV-', '', $lastInvoice->invoice_id);
        return 'INV-' . ($lastNumber + 1);
    }
}
