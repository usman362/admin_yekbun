<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'users_requests';

    protected $fillable = [
        'user_id',
        'request_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'request_id');
    }
}
