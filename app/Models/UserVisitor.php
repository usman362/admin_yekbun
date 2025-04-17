<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserVisitor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'users_visitors';

    protected $fillable = [
        'user_id',
        'visitor_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visitor()
    {
        return $this->belongsTo(User::class, 'visitor_id');
    }
}
