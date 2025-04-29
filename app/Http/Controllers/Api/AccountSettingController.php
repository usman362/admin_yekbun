<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserCode;
use App\Mail\SendCodeMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountSettingController extends Controller
{
    public function change_password(Request $request)
    // this is the code when user try to change your password.
    {
        $request->validate([
            'oldPassword' => 'required',

        ]);
        if (!Hash::check($request->oldPassword, $request->user()->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.']);
        } else {
            User::whereId($request->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['success' => true, 'message' => 'Password successfully updated.']);
        }
    }


    public function send_old_email_code(Request $request)
    {
        $request->validate([
            'oldEmail' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->oldEmail)->first();

        // Generate OTP with expiration
        $code = rand(1000, 9999);
        UserCode::updateOrCreate(
            ['user_id' => $user->id, 'type' => 'email_change_old'],
            ['code' => $code, 'expires_at' => now()->addMinutes(10)]
        );

        try {
            Mail::to($request->oldEmail)->send(new SendCodeMail(['code' => $code]));
            return response()->json(['success' => true, 'message' => "OTP sent to old email."]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => "Failed to send OTP.", 'error' => $e->getMessage()]);
        }
    }

    public function send_new_email_code(Request $request)
    {
        $request->validate([
            'newEmail' => 'required|email|unique:users,email',
        ]);

        $code = rand(1000, 9999);
        UserCode::updateOrCreate(
            ['email' => $request->newEmail, 'type' => 'email_change_new'],
            ['code' => $code, 'expires_at' => now()->addMinutes(10)]
        );

        try {
            Mail::to($request->newEmail)->send(new SendCodeMail(['code' => $code]));
            return response()->json(['success' => true, 'message' => "OTP sent to new email."]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => "Failed to send OTP.", 'error' => $e->getMessage()]);
        }
    }


    public function change_email(Request $request)
    {
        $request->validate([
            'oldEmail' => 'required|email|exists:users,email',
            'newEmail' => 'required|email|unique:users,email',
            // 'oldOtp' => 'required|digits:4',
            'newOtp' => 'required|digits:4',
        ]);

        $user = User::where('email', $request->oldEmail)->first();

        // Check OTP for old email
        // $oldOtp = UserCode::where(['user_id' => $user->id, 'type' => 'email_change_old', 'code' => $request->oldOtp])
        //     ->where('expires_at', '>=', now())->first();

        // if (!$oldOtp) {
        //     return response()->json(['success' => false, 'message' => 'Invalid or expired OTP for old email.']);
        // }

        // Check OTP for new email
        $newOtp = UserCode::where(['email' => $request->newEmail, 'type' => 'email_change_new', 'code' => $request->newOtp])
            ->where('expires_at', '>=', now())->first();

        if (!$newOtp) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP for new email.']);
        }

        // Update email
        $user->update(['email' => $request->newEmail]);

        // Delete used OTPs
        $oldOtp->delete();
        $newOtp->delete();

        return response()->json(['success' => true, 'message' => 'Email successfully updated.']);
    }


    public function resend_email_code(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        // This is the code when user click on resend button..
        $user = UserCode::with('user')->where('user_id', $request->user_id)->first();
        $code =  rand(1000, 9999);
        try {
            $details = [
                'title' => 'Mail from Yekbun.org',
                'code' => $code,
                'username' => $user->user->username ?? '',
            ];
            Mail::to($request->NewEmail)->send(new SendCodeMail($details));
            $user->code = $code;
            $user->save();
            return response()->json(['success' => true, 'message' => "Email successfully resent. "]);
        } catch (\Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }

    public function upgrade_account(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'level' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (isset($user)) {

            $user->level = $request->level;
            $user->save();
            $levels = [
                0 => 'Standard',
                1 => 'Premium',
                2 => 'VIP'
            ];
            return response()->json(['success' => true, 'message' => "User Upgrade to {$levels[$request->level]} Successfully."]);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        }
    }
}
