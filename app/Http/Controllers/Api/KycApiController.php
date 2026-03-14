<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ZercashSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class KycApiController extends Controller
{

    public function verifyOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = User::find(Auth::id());

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if (empty($user->kyc_otp)) {
            return ResponseHelper::sendResponse(null, 'No OTP found.', false, 400);
        }

        if ($user->kyc_otp !== $request->otp) {
            return ResponseHelper::sendResponse(null, 'Invalid OTP.', false, 401);
        }

        $user->kyc_otp = null;
        $user->kyc_otp_verified = true;
        $user->save();

        return ResponseHelper::sendResponse([
            'verified' => true
        ], 'OTP verified successfully.');

    }


    public function submit(Request $request)
    {

        $rules = [
            'document_type' => 'required|in:national_id,passport,driver_license,work_company_license',
            'document_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'selfie' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'full_name' => 'nullable|string|max:255',
            'document_number' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'expiry_date' => 'nullable|string',
        ];

        $docType = $request->input('document_type');

        if (in_array($docType, ['national_id', 'driver_license'])) {
            $rules['document_back'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:5120';
        } else {
            $rules['document_back'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120';
        }

        $validator = Validator::make($request->all(), $rules, [
            'document_back.required' => 'Back of document is required for ' . str_replace('_', ' ', $docType ?? '') . '.',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $user = User::find(Auth::id());

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if (empty($user->kyc_otp_verified)) {
            return ResponseHelper::sendResponse(null, 'Please verify OTP first.', false, 403);
        }

        $kyc = new KycVerification();

        $kyc->user_id = $user->_id;
        $kyc->document_type = $docType;

        $frontFile = $request->file('document_front');

        $frontName = 'kyc_front_' . $user->_id . '_' . time() . '.' . $frontFile->getClientOriginalExtension();

        $kyc->document_front = $frontFile->storeAs('kyc/' . $user->_id, $frontName, 'public');

        if ($request->hasFile('document_back')) {

            $backFile = $request->file('document_back');

            $backName = 'kyc_back_' . $user->_id . '_' . time() . '.' . $backFile->getClientOriginalExtension();

            $kyc->document_back = $backFile->storeAs('kyc/' . $user->_id, $backName, 'public');
        }

        if ($request->hasFile('selfie')) {

            $selfieFile = $request->file('selfie');

            $selfieName = 'kyc_selfie_' . $user->_id . '_' . time() . '.' . $selfieFile->getClientOriginalExtension();

            $kyc->selfie_with_id = $selfieFile->storeAs('kyc/' . $user->_id, $selfieName, 'public');
        }

        $kyc->full_name = $request->full_name;
        $kyc->document_number = $request->document_number;
        $kyc->date_of_birth = $request->date_of_birth;
        $kyc->nationality = $request->nationality;
        $kyc->expiry_date = $request->expiry_date;

        $kyc->status = 'pending';
        $kyc->submitted_at = Carbon::now();

        $kyc->save();

        $user->kyc_status = 'pending';
        $user->save();

        return ResponseHelper::sendResponse([
            'kyc_id' => $kyc->_id,
            'status' => 'pending'
        ], 'KYC submitted.');

    }


    public function review(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kyc_id' => 'required|string',
            'action' => 'required|in:approve,reject',
            'reason' => 'required_if:action,reject|nullable|string',
        ]);

        if ($validator->fails()) {
            return ResponseHelper::sendResponse(
                $validator->errors(),
                'Validation error.',
                false,
                422
            );
        }

        $kyc = KycVerification::find($request->kyc_id);

        if (!$kyc) {
            return ResponseHelper::sendResponse(null, 'KYC record not found.', false, 404);
        }

        $user = User::find($kyc->user_id);

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if ($request->action === 'approve') {

            $kyc->status = 'approved';
            $kyc->reviewed_at = Carbon::now();
            $kyc->save();

            $user->kyc_status = 'approved';
            $user->save();

            return ResponseHelper::sendResponse([
                'kyc_status' => 'approved'
            ], 'KYC approved');

        } else {

            $kyc->status = 'rejected';
            $kyc->rejection_reason = $request->reason;
            $kyc->reviewed_at = Carbon::now();
            $kyc->save();

            $user->kyc_status = 'rejected';
            $user->save();

            return ResponseHelper::sendResponse([
                'kyc_status' => 'rejected'
            ], 'KYC rejected');

        }

    }

}
