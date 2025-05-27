<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ReportFeeds extends Eloquent // ✅ Use MongoDB Eloquent Model
{
    use HasFactory;

    protected $collection = 'report_feeds'; // Optional, 'table' is fine too

    protected $fillable = [
        'user_id',
        'report_type',
        'feed_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function feed()
    {
        return $this->belongsTo(Feed::class, 'feed_id', '_id');
    }
}
