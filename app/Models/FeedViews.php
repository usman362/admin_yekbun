<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class FeedViews extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'feed_views';

    protected $fillable = [
        'user_id',
        'feed_id',
        'feed_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin_feed()
    {
        return $this->belongsTo(PopFeeds::class);
    }

    public function user_feed()
    {
        return $this->belongsTo(Feed::class);
    }

    public function history()
    {
        return $this->belongsTo(History::class);
    }

}
