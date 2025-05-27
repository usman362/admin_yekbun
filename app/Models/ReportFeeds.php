<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFeeds extends Model
 {
    use HasFactory;

    // Specify the table name explicitly
    protected $table = 'report_feeds';

    protected $fillable = [
        'user_id',
        'report_type',
        'feed_id',
    ];

    public function user()
 {
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function feed()
 {
        return $this->belongsTo( Feed::class, 'feed_id' );
    }
}
