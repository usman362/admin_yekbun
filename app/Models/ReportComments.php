<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ReportComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'report_type',
        'comment_id',
    ];

public function user()
{
    return $this->belongsTo(User::class, 'user_id', '_id');
}

    public function comments()
{
    return $this->belongsTo(FeedComments::class, 'comment_id');
}
    public function feed()
{
    return $this->hasOneThrough(
        Feed::class,
        FeedComments::class,
        '_id',       // Foreign key on FeedComments (local comment_id matches FeedComments _id)
        '_id',       // Foreign key on Feed (local feed_id in FeedComments matches Feed _id)
        'comment_id',// Local key on ReportComments
        'feed_id'    // Local key on FeedComments
    );
}
}
