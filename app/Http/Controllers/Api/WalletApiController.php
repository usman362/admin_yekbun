<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WalletApiController extends Controller
{

    public function createWallet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pin' => 'required|string|size:4|regex:/^[0-9]{4}$/',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = Auth::user();

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        $wallet = Wallet::where('user_id', $user->_id)->first();

        if ($wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet already exists.', false, 400);
        }

        $wallet = new Wallet();
        $wallet->user_id = $user->_id;
        $wallet->pin = bcrypt($request->pin);
        $wallet->status = 'under_review';
        $wallet->created_at = Carbon::now();
        $wallet->save();

        return ResponseHelper::sendResponse($wallet, 'Wallet created successfully.');
    }


    public function activateWallet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $wallet = Wallet::where('user_id', $request->user_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        $wallet->status = 'activated';
        $wallet->activated_at = Carbon::now();
        $wallet->save();

        return ResponseHelper::sendResponse($wallet, 'Wallet activated.');
    }


    public function verifyPin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pin' => 'required|string|size:4',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = Auth::user();

        $wallet = Wallet::where('user_id', $user->_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        if (!password_verify($request->pin, $wallet->pin)) {
            return ResponseHelper::sendResponse(null, 'Invalid PIN.', false, 401);
        }

        return ResponseHelper::sendResponse([
            'verified' => true
        ], 'PIN verified.');
    }


    public function changePin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_pin' => 'required|string|size:4',
            'new_pin'     => 'required|string|size:4|regex:/^[0-9]{4}$/',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = Auth::user();

        $wallet = Wallet::where('user_id', $user->_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        if (!password_verify($request->current_pin, $wallet->pin)) {
            return ResponseHelper::sendResponse(null, 'Current PIN incorrect.', false, 401);
        }

        $wallet->pin = bcrypt($request->new_pin);
        $wallet->save();

        return ResponseHelper::sendResponse(null, 'PIN changed successfully.');
    }

    public function walletStatus()
    {
        $user = Auth::user();

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        $wallet = Wallet::where('user_id', $user->_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse([
                'has_wallet' => false,
            ], 'No wallet found. Please create one.');
        }

        $statusMessages = [
            'under_review' => 'We will review your request. We will get back soon.',
            'activated'    => 'Wallet is activated. Enjoy...',
            'on_hold'      => 'Wallet is on Hold. See the reason here.',
            'closed'       => 'Wallet is Closed. The account will be removed after 90 Days.',
        ];

        $status = $wallet->status ?? 'under_review';

        return ResponseHelper::sendResponse([
            'has_wallet'      => true,
            'wallet_id'       => $this->maskWalletId($wallet->_id),
            'wallet_status'   => $status,
            'status_message'  => $statusMessages[$status] ?? 'Unknown status.',
            'hold_reason'     => $wallet->status_reason ?? null,
            'expire_at'       => $wallet->expire_at ?? null,
            'created_at'      => $wallet->created_at ?? null,
        ], 'Wallet status fetched.');
    }

    public function updateWalletStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string',
            'status'  => 'required|in:under_review,activated,on_hold,closed',
            'reason'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $wallet = Wallet::where('user_id', $request->user_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        $wallet->status = $request->status;
        $wallet->status_reason = $request->reason;
        $wallet->updated_at = Carbon::now();
        $wallet->save();

        return ResponseHelper::sendResponse($wallet, 'Wallet status updated.');
    }


    public function deposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount'         => 'required|numeric|min:1',
            'payment_method' => 'required|in:card,paypal,bank',
            'description'    => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = Auth::user();

        $wallet = Wallet::where('user_id', $user->_id)->first();

        if (!$wallet) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        $wallet->balance += $request->amount;
        $wallet->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->_id;
        $transaction->type = 'deposit';
        $transaction->amount = $request->amount;
        $transaction->payment_method = $request->payment_method;
        $transaction->description = $request->description;
        $transaction->created_at = Carbon::now();
        $transaction->save();

        return ResponseHelper::sendResponse([
            'balance' => $wallet->balance
        ], 'Deposit successful.');
    }
}
