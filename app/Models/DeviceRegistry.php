<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

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

    protected $casts = [
        'first_seen' => 'datetime',
        'last_active' => 'datetime',
        'is_blocked' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
