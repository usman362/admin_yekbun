<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityLog extends Model
{
    use HasFactory;

    protected $collection = 'security_logs';

    protected $fillable = [
        'user_id',
        'event_type',
        'ip_address',
        'device_fingerprint',
        'is_suspicious',
        'details',
        'timestamp',
    ];
}
