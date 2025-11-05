<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceRegistry extends Model
{
    use HasFactory;

    protected $collection = 'device_registry';
    protected $fillable = [
        'user_id',
        'device_fingerprint',
        'device_model',
        'android_version',
        'first_seen',
        'last_active',
        'is_blocked',
        'request_count',
    ];
}
