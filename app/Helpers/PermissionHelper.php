<?php

namespace App\Helpers;

use App\Models\Setting;

class PermissionHelper
{
    public static function checkPermission($level, $key, $message = null)
    {
        $userType = [
            0 => 'cultivated',
            1 => 'educated',
            2 => 'academic',
        ];
        $permissions = Setting::where('name', $userType[$level])->first();
        $test = $permissions['value'][$key];

        if ($test === true) {
            return true;
        } elseif ($test !== true && $test !== false) {
            return $test;
        } else {
            return false;
        }
    }
}
