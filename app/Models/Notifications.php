<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'notifications';

    protected $fillable = [
        'new_donation',
        'new_events',
        'new_history',
        'new_music',
        'new_artist',
        'new_video_clips',
        'new_news',
        'new_videos',
        'new_votes',
    ];
}
