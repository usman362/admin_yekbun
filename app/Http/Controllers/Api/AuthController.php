<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use session;
use App\Models\User;
use App\Models\UserCode;
use App\Mail\SendCodeMail;
use App\Mail\YekhbunMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResetUserPassword;
use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\UserImei;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadMedia;
use Carbon\Carbon;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use UploadMedia;

    public function login(Request $request)
    {
        // Validate the request input
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_imei' => 'required'
        ]);

        // Additional validation for user roles and status
        (int)$credentials['is_admin_user'] = 0;
        (int)$credentials['is_superadmin'] = 0;
        (int)$credentials['status'] = 1;

        // Check if the user exists by email
        $email = strtolower($request->email);
        $user = User::where('email', $email)->first();

        // If user exists, check the device IMEI
        if ($user) {
            if ($user->email !== 'test_yekbun@gmail.com') {
                if ($user->device_imei != $request->device_imei) {
                    $imeis = UserImei::where('user_id', $user->id)->pluck('device_imei');
                    return response()->json(['message' => 'Device IMEI is not registered', 'imeis' => $imeis], 404);
                }
            }
        } else {
            return response()->json(['message' => 'User not Found!'], 404);
        }

        // Check if the credentials are correct (email, password)
        if (Auth::attempt(['email' => $email, 'password' => $request->password], true)) {
            $user = Auth::user();

            // Ensure the user's email is verified
            if ($user->email_verified_at == null || $user->email_verified_at == '') {
                return response()->json(['success' => false, 'message' => 'Your email is not verified.']);
            }

            // Generate a JWT token for the authenticated user
            try {
                if (!$token = JWTAuth::fromUser($user)) {
                    return response()->json(['error' => 'Invalid credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'Could not create token'], 500);
            }

            // Return the user data and JWT token
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user,
                    'token' => $token  // This is your Bearer token
                ]
            ], 200);
        } else {
            // If credentials are incorrect, return an error
            return response()->json(['success' => false, 'message' => 'Email or password is incorrect.']);
        }
    }

    public function signup(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'fname' => 'required|max:100',
                'lname' => 'required|max:100',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'phone' => 'required|min:11',
            ]);
            $email = strtolower($request->email);
            $emailTaken = User::where('email', $email)->first();

            if ($emailTaken) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email is already taken.',
                ]);
            }

            $usernameTaken = User::where('username', $request->username)->first();

            if ($usernameTaken) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username is already taken.',
                ]);
            }

            $deviceImei = User::where('device_imei', $request['device_imei'])->first();

            if ($deviceImei) {
                return response()->json([
                    'success' => false,
                    'message' => 'Imei is already taken.',
                ]);
            }

            $user = User::create([
                'name' => $request['fname'],
                'username' => $request['username'],
                'email' => $email,
                'password' => bcrypt($request['password']),
                'status' => (int)'1',
                'is_admin_user' => (int)'0',
                'level' => (int)'0',
                'is_verfied' => (int)'0',
                'is_superadmin' => (int)'0',
                'last_name' => $request['lname'],
                'language' => $request['language'],
                'gender' => $request['gender'],
                'origin' => $request['origin'],
                'location' => $request['location'],
                'marital_status' => $request['marital_status'],
                'dob' => $request['dob'],
                'province' => $request['province'],
                'city' => $request['city'],
                'phone' => $request['phone'],
                'device_type' => $request['device_type'],
                'device_imei' => $request['device_imei'],
                'device_name' => $request['device_name'],
                'device_model' => $request['device_model'],
                'device_serial' => $request['device_serial'],
                'user_id' => 'YB-US' . (User::count() + 1),
                'user_type' => 'educated'
            ]);

            if ($request->has('image')) {
                $image_path = Helpers::fileUpload($request->image, 'images/user');
                $user->image = $image_path;
                $user->save();
            }

            if ($user->id) {
                $code = rand(1000, 9999);
                UserCode::updateOrCreate(
                    ['user_id' => $user->id],
                    ['code' => $code]
                );

                UserImei::create([
                    'user_id' => $user->id,
                    'device_imei' => $request['device_imei'],
                ]);

                try {
                    $details = [
                        'title' => 'Mail from Yekbun.org',
                        'code' => $code,
                        'username' => $request->username,
                    ];
                    Mail::to($request['email'])->send(new SendCodeMail($details));
                    return response()->json(['success' => true, "message" => "Verfication Code sent to your email", 'user' => $user->id], 201);
                    return response()->json(['success' => true, "message" => "User has been Successfully Created!", 'user' => $user->id], 201);
                } catch (\Exception $e) {
                    info("Error: " . $e->getMessage());
                    return response()->json(['success' => false, 'message' => $e->getMessage()], 505);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage(),
            ], 422);
        }
    }

    public function userImei(Request $request)
    {
        $deviceImei = User::where('device_imei', $request['device_imei'])->first();

        if ($deviceImei) {
            return response()->json([
                'success' => false,
                'message' => 'Imei is already taken.',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Imei not found!.',
        ], 200);
    }

    public function verifyDevice(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $email = strtolower($request->email);
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not Found!'], 404);
        }
        if ($user->id) {
            $code = rand(1000, 9999);
            UserCode::updateOrCreate(
                ['user_id' => $user->id],
                ['code' => $code]
            );

            try {
                $details = [
                    'title' => 'Mail from Yekbun.org',
                    'code' => $code,
                    'username' => $user->username ?? 'User',
                ];
                Mail::to($request['email'])->send(new SendCodeMail($details));
                return response()->json(['success' => true, "message" => "Verfication Code sent to your email", 'user' => $user->id, 'code' => $code], 201);
            } catch (\Exception $e) {
                info("Error: " . $e->getMessage());
                return response()->json(['success' => false, 'message' => $e->getMessage()], 505);
            }
        }
    }

    public function registerDevice(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'device_serial' => 'required',
            'device_model' => 'required',
            'device_type' => 'required',
            'device_imei' => 'required',
            'device_name' => 'required',
            'otp' => 'required',
        ]);
        $email = strtolower($request->email);
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not Found!'], 404);
        }

        $code = UserCode::where('user_id', $user->id)->first();

        if (!$code) {
            return response()->json(['status' => false, 'message' => 'Code not found!'], 404);
        }
        if ((int)$code->code == (int)$request->otp) {

            try {
                $email = strtolower($request->email);
                User::updateOrCreate(
                    ['email' => $email],
                    [
                        'device_serial' => $request->device_serial,
                        'device_type' => $request->device_type,
                        'device_model' => $request->device_model,
                        'device_imei' => $request->device_imei,
                        'device_name' => $request->device_name,
                    ]
                );
                UserCode::where('user_id', $user->id)->delete();
                return response()->json(['message' => 'New device registered successfully.'], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to register device'], 403);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid Code!'], 403);
        }
    }

    public function getCode(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp' => 'required',
        ]);
        $email = strtolower($request->email);
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found!'], 404);
        }

        $code = UserCode::where('user_id', $user->id)->first();

        if (!$code) {
            return response()->json(['status' => false, 'message' => 'Code not found!'], 404);
        }

        if ((int)$code->code == (int)$request->otp) {
            $user->email_verified_at = Carbon::now();
            $user->is_verfied = (int)1;
            $user->save();
            return response()->json(['status' => true, 'message' => 'Valid Code!'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid Code!'], 403);
        }
    }

    public function logout(Request $request)
    {
        // Revoke the current user's token
        $request->user()->currentAccessToken()->delete();

        // Return a response indicating success
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function forgot_password(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);
        $email = strtolower($request->email);
        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No user found with the email.']);
        }

        // Generate Random Code

        $code = rand(1000, 9999);
        $token  = Str::random(20);
        $tempreset = ResetUserPassword::where('user_id', $user->id)->get();
        if ($tempreset) {
            foreach ($tempreset as $userDel) {
                $userDel->delete();
            }
        }
        ResetUserPassword::updateorCreate(['code' => $code, 'user_id' => $user->id, 'token' => $token, 'email' => $user->email]);
        try {
            $details = [
                'title' => 'Mail from Yekbun.org',
                'code' => $code,
                'username' => $user->username
            ];
            Mail::to($user->email)->send(new SendCodeMail($details));
            return response()->json(['success' => true, 'message' => 'A verification email has been sent to ' . $user->email . '!', 'data' => ['user_id' => $user->id, 'email' => $user->email, 'token' => $token]], 201);
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'token' => 'required',
            'user_id' => 'required'
        ]);

        // Find the reset entry
        $resetEntry = ResetUserPassword::where('user_id', $request->user_id)->first();
        if (!$resetEntry || $resetEntry->password_token != $request->token) {
            return response()->json(['success' => false, 'message' => 'Invalid token or user.'], 400);
        }

        // Find the user
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Remove the reset entry
        ResetUserPassword::where('user_id', $request->user_id)->delete();

        return response()->json(['success' => true, 'message' => 'Your password has been changed.'], 200);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'token' => 'required',
            'user_id' => 'required'
        ]);

        // Find the reset entry
        $resetEntry = ResetUserPassword::where('user_id', $request->user_id)->first();
        if (!$resetEntry) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Validate the token and OTP
        if ($request->token != $resetEntry->token) {
            return response()->json(['success' => false, 'message' => 'Invalid token.'], 400);
        }

        if ($resetEntry->code == $request->code) {
            $password_token = Str::random(50);
            $resetEntry->password_token = $password_token;
            $resetEntry->save();

            return response()->json(['success' => true, 'data' => ['token' => $password_token, 'user_id' => $resetEntry->user_id]], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'OTP code is incorrect.'], 400);
        }
    }

    public function reset_resend(Request $request)
    {
        $user = ResetUserPassword::where('user_id', $request->user_id)->first();
        $code = rand(1000, 9999);

        try {

            $details = [
                'title' => 'Mail from Yekbun.com',
                'code' => $code,
                'username' => $user->username
            ];

            Mail::to($user->email)->send(new SendCodeMail($details));

            $user->code = $code;
            $user->save();

            return response()->json(['success' => true, "message" => "Email successfully resent."]);
        } catch (\Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }

    public function existsEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = User::where('email', $request->email)->first();

        if (!empty($email)) {
            return response()->json(['email' => $request->email, 'success' => true], 200);
        } else {
            return response()->json(['email' => null, 'success' => false], 404);
        }
    }

    public function acceptPrivacyPolicy(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required',
        ]);

        try {
            User::updateOrCreate(['id' => Auth::id()], [
                'isPrivacyPolicyAccepted' => $request->privacy_policy,
            ]);
            $user = User::find(Auth::id());
            return response()->json(['message' => 'Privacy Policy has been Accepted!','user' => $user, 'success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something Went Wrong', 'success' => false], 403);
        }
    }
}
