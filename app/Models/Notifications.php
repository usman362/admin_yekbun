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
        'new_ai_videos',
        'new_music',
        'new_artist',
        'new_video_clips',
        'new_news',
        'new_videos',
        'new_votes',
        'admin_system_info',
        'admin_donation',
        'admin_surveys',
        'admin_greetings',
        'admin_events',
        'admin_sos',
        'admin_live_stream'
    ];
}
