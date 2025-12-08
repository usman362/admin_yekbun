<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class NotificationCenter extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'notifications_center';

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'send_by',
        'user_image',
        'type',
        'is_read',
        'read_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function send_by()
    {
        return $this->belongsTo(User::class, 'send_by');
    }
}
