<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserVideo extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'user_videos';

    protected $fillable = [
        'user_id',
        'video',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
