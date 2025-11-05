<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SecurityLog;
use App\Models\DeviceRegistry;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function events()
    {
        return response()->json(SecurityLog::orderBy('timestamp', 'desc')->limit(100)->get());
    }

    public function suspiciousDevices()
    {
        $devices = DeviceRegistry::where('is_blocked', false)
            ->where('request_count', '>', 1000) // Example condition
            ->get();

        return response()->json($devices);
    }

    public function blockDevice(Request $request)
    {
        $device = DeviceRegistry::where('device_fingerprint', $request->fingerprint)->first();

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        $device->update(['is_blocked' => true]);

        log_security_event($device->user_id, 'device_blocked', $device->device_fingerprint, [], true);

        return response()->json(['success' => true, 'message' => 'Device blocked successfully']);
    }
}
