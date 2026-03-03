<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Models\User;
use App\Models\UserCode;
use App\Mail\SendCodeMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AppVersionController extends Controller
{
    public function getVersion(Request $request)
    {
        $version = AppVersion::first();

        // Agar record exist nahi karta to create kar do
        if (!$version) {
            $version = AppVersion::create([
                'version_number' => '0.00'
            ]);
        }

        // Agar request me version_number aaya hai to update kar do
        if ($request->filled('version_number')) {
            $version->update([
                'version_number' => $request->version_number
            ]);
        }

        return ResponseHelper::sendResponse($version->version_number, 'Version fetched Successfully');
    }
}
