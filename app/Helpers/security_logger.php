<?php

use App\Models\SecurityLog;

if (!function_exists('log_security_event')) {
    function log_security_event($userId, $eventType, $fingerprint, $details = [], $isSuspicious = false)
    {
        SecurityLog::create([
            'user_id' => $userId,
            'event_type' => $eventType,
            'ip_address' => request()->ip(),
            'device_fingerprint' => $fingerprint,
            'is_suspicious' => $isSuspicious,
            'details' => $details,
            'timestamp' => now(),
        ]);
    }
}
