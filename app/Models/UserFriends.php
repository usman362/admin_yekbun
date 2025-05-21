<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserFriends extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'users_friends';

    protected $fillable = [
        'user_id',
        'friend_id',
        'user_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
