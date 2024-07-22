<?php

namespace App\Http\Controllers\Api;

use session;
use App\Models\User;
use App\Models\UserCode;
use App\Mail\SendCodeMail;
use App\Mail\YekhbunMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResetUserPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadMedia;

class AuthController extends Controller
{
  use UploadMedia;

  public function login(Request $request)
  {
    $credentials = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    (int)$credentials['is_admin_user'] = 1;
    (int)$credentials['status'] = 1;
    if (Auth::attempt($credentials, true)) {
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        if ($user->status == 0)
        return response()->json(['success' => false, 'message' => 'Your email is not verified.']);

    // $token = explode('|', $user->createToken('Yekhbun')->plainTextToken)[1];
    $user = $request->user();
    $tokenResult = $user->createToken('Personal Access Token');
    $token = $tokenResult->plainTextToken;
    dd($token);

      return response()->json(['success' => true, 'data' => ['user' => $user, 'token' => $token]], 200);
    } else {
      return response()->json(['success' => false, 'message' => 'Email or password is incorrect.']);
    }
  }

  public function signup(Request $request)
  {
    $validatedData = $request->validate([
      'fname' => 'required|max:100',
      'lname' => 'required|max:100',
      'email' => 'required',
      'password' => 'required|min:6',
      'phone' => 'required|min:11',
    ]);

    $userExist = User::where('email', $request->email)->first();

    if ($userExist) {
      return response()->json([
        'success' => false,
        'message' => 'Email is already taken.',
      ]);
    }

    $user = User::create([
        'name' => $request['fname'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'status' => (int)'1',
        'is_admin_user' => (int)'0',
        'level' => (int)'1',
        'is_verfied' => (int)'1',
        'is_superadmin' => (int)'0',
        'last_name' => $request['lname'],
        'phone' => $request['phone']
    ]);


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
          'username' => $request->username,
        ];

        Mail::to($request['email'])->send(new SendCodeMail($details));
        return response()->json(['success' => true, "message" => "Verfication Code sent to your email", 'data' => $user->id], 201);
      } catch (\Exception $e) {
        info("Error: " . $e->getMessage());
        return response()->json(['success' => false, 'message' => $e->getMessage()], 505);
      }
    }
  }

  public function forgot_password(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
    ]);

    $user = User::where('email', '=', $request->email)->first();
    if (!$user) {
      return response()->json(['success' => false, 'message' => 'No user found with the email.']);
    }

    // Generate Random Code

    $code = rand(1000, 9999);
    $token  = Str::random(20);
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
    $user  = ResetUserPassword::where('user_id', $request->user_id)->first();
    if ($user->password_token != $request->token)
      return response()->json(['success' => false, 'message' => 'Something went wrong']);

    $user = User::find($request->user_id);
    if ($user == '')
      return response()->json(['success' => false, 'message' => 'User Not found.']);

    $user->password = bcrypt($request->password);
    $user->save();

    ResetUserPassword::where('user_id', $request->user_id)->delete();

    return response()->json(['success' => true, 'message' => 'Your password has been changed.']);
  }

  public function reset(Request $request)
  {
    $request->validate([
      'code' => 'required',
    ]);

    $user = ResetUserPassword::where('user_id', $request->user_id)->first();
    if ($user !== "") {
      if ($request->token != $user->token)
        return response()->json(['success' => false, 'message' => 'Something went wrong.']);

      if ($user->code == $request->code) {
        $password_token = Str::random(50);
        $user->password_token = $password_token;
        $user->save();
        return response()->json(['success' => true, 'data' => ['token' => $password_token, 'user_id' => $user->user_id]]);
      } else {
        return response()->json(['success' => false, 'message' => 'OTP code is incorrect.']);
      }
    } else {
      return response()->json(['success' => false, 'message' => 'User not found.']);
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
}
