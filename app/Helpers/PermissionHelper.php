<?php

namespace App\Helpers;

use App\Models\Setting;

class PermissionHelper
{
    // public static function checkPermission($level, $key, $message = null)
    // {
    //     $userType = [
    //         0 => 'cultivated',
    //         1 => 'educated',
    //         2 => 'academic',
    //     ];
    //     $permissions = Setting::where('name', $userType[$level])->first();
    //     $test = $permissions['value'][$key];

    //     if ($test === true) {
    //         return true;
    //     } elseif ($test !== true && $test !== false) {
    //         return $test;
    //     } else {
    //         return false;
    //     }
    // }
    public static function checkPermission($level, $key, $message = null)
{
    $userType = [
        0 => 'cultivated',
        1 => 'educated',
        2 => 'academic',
    ];

    // Validate user type
    if (!array_key_exists($level, $userType)) {
        return false;
    }

    // Fetch settings for user type
    $permissions = Setting::where('name', $userType[$level])->first();

    // Ensure permissions exist and value is an array
    if (!$permissions || !is_array($permissions->value) || !array_key_exists($key, $permissions->value)) {
        return false;
    }

    $test = $permissions->value[$key];

    if ($test === true) {
        return true;
    } elseif ($test !== true && $test !== false) {
        return $test; // Possibly an int or string limit
    } else {
        return false;
    }
}

}
