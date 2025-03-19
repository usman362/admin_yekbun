<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class PopFeedLikes extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'pop_feed_likes';

    protected $fillable = [
        'user_id',
        'pop_feed_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feed()
    {
        return $this->belongsTo(PopFeeds::class);
    }

}
