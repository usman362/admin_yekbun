<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Paypal as PaypalModel;
use Illuminate\Http\Request;
use App\Services\PayPalService;

class PayPalController extends Controller
{
    protected $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function keys()
    {
        $paypal = PaypalModel::orderBy('id' , 'desc')->first();
        return ResponseHelper::sendResponse($paypal,'Paypal keys has been fetch successfully');
    }

    public function createOrder(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:0.1']);

        $order = $this->paypal->createOrder($request->amount);
        $approvalLink = collect($order->links)->firstWhere('rel', 'approve')->href;

        return response()->json([
            'order_id' => $order->id,
            'approval_url' => $approvalLink,
        ]);
    }

    public function captureOrder(Request $request)
    {
        $request->validate(['order_id' => 'required|string']);

        $result = $this->paypal->captureOrder($request->order_id);

        // Save transaction in DB
        // Payment::create([...]);

        return response()->json([
            'status' => 'success',
            'payment_details' => $result->result,
        ]);
    }
}
