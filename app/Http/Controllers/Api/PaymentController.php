<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplePay;
use App\Models\BankTransfer;
use App\Models\GooglePay;
use App\Models\Paypal;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $redirect_link = '';
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    /**
     * Call a view.
     */
    public function index()
    {
        return view('payment');
    }

    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {

        try {
            $amountInDollars = $request->amount;
            $amountInCents = $amountInDollars;

            $response = $this->gateway->purchase(array(
                'amount' => $request->input('amount'),
                'items' => array(
                    array(
                        'name' => 'Yekbun',
                        'price' => $request->input('amount'),
                        'description' => 'Account Upgrade',
                        'quantity' => 1,
                    )
                ),
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('/api/success?level=' . $request->level . '&user_id=' . $request->user_id),
                'cancelUrl' => url('/api/error'),
            ))->send();

            if ($response->isRedirect()) {
                $data = [
                    'redirect_url' => $response->getRedirectUrl()
                ];
                return response()->json($data);
            } else {
                // not successful
                return response()->json(['message' => $response->getMessage()], 500);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        if ($request->has('payment_id'))
            return view('content.paypal.success');

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr_body = $response->getData();

                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->type = 'paypal';
                $payment->transaction_id = 'YK' . mt_rand(100000000, 999999999);
                $payment->status = 1;
                $payment->user_id = $request->user_id;
                $payment->level = $request->level;
                $payment->save();

                $user = User::find(intval($payment->user_id));
                $user->level = intval($payment->level);
                $user->save();

                return redirect('/api/success?payment_id=' . $payment->payment_id);
            } else {
                return response()->json(['success' => false, 'data' => $response->getMessage()]);
            }
        } else {
            return response()->json(['success' => false, 'data' => 'Transcation is declined.']);
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        return response()->json(['success' => false, 'data' => 'User Cancelled the payment.']);
        // return 'User cancelled the payment.';
    }

    public function payment_details($payment_id)
    {
        $payment = Payment::where('payment_id', $payment_id)->first();

        return response()->json(['success' => true, 'data' => $payment]);
    }

    public function paymentList()
    {
        $applePays = ApplePay::all();
        $bankTransfers = BankTransfer::all();
        $googlePays = GooglePay::all();
        $payPal = Paypal::all();

        $payments = [
            'apple_pay' => $applePays,
            'bank_transfer' => $bankTransfers,
            'google_pay' => $googlePays,
            'paypal' => $payPal,
        ];

        return ResponseHelper::sendResponse($payments, 'Payments List Fetch');
    }

    public function storeTransaction(Request $request)
    {
        try {
            $transaction = new Transaction();
            $transaction->tId = $request->tId;
            $transaction->amount = $request->amount;
            $transaction->status = $request->status;
            $transaction->subscription_type = $request->subscription_type;
            $transaction->transaction_type = $request->transaction_type;
            $transaction->userType = $request->userType;
            $transaction->user_id = $request->user_id;
            $transaction->save();

            if ($request->status === 'COMPLETED') {
                $level = [
                    'Cultivated' => 0,
                    'Educated' => 1,
                    'Academic' => 2,
                ];
                $user = User::find($request->user_id);

                if ($user) {
                    $current = Carbon::now();
                    $newExpiry = match ($request->subscription_type) {
                        'monthly' => $current->copy()->addMonth(),
                        'yearly' => $current->copy()->addYear(),
                        default => null
                    };

                    if ($newExpiry) {
                        $user->expired_at = $newExpiry;
                        $user->level = $level[$request->userType];
                        $user->user_type = Str::lower($request->userType);
                        $user->subscription_type = $request->subscription_type;
                        $user->save();
                    }
                }
            }
            return ResponseHelper::sendResponse($transaction, 'Transaction stored successfully.');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Failed to stored Transaction.', false, 403);
        }
    }
}
