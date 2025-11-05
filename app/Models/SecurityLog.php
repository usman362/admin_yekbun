<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SecurityLog extends Model
{
    use HasFactory;

    protected $collection = 'security_logs';

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'event_type',
        'ip_address',
        'device_fingerprint',
        'is_suspicious',
        'details',
        'timestamp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
