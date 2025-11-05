<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\DeviceRegistry;
use Illuminate\Http\Request;

class ValidateDevice
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $deviceFingerprint = $request->header('X-Device-Fingerprint');

        if (!$user || !$deviceFingerprint) {
            return response()->json(['error' => 'Unauthorized or missing fingerprint'], 401);
        }

        $device = DeviceRegistry::where('user_id', $user->id)
            ->where('device_fingerprint', $deviceFingerprint)
            ->first();

        if (!$device) {
            return response()->json(['error' => 'Unregistered device'], 403);
        }

        if ($device->is_blocked) {
            return response()->json(['error' => 'Device blocked'], 403);
        }

        // Update last_active and request count
        $device->update([
            'last_active' => now(),
            'request_count' => ($device->request_count ?? 0) + 1,
        ]);

        return $next($request);
    }
}
