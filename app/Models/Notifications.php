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
        'admin_system_info',
        'admin_system_info_title',
        'admin_system_info_description',
        'admin_donation',
        'admin_donation_title',
        'admin_donation_description',
        'admin_surveys',
        'admin_surveys_title',
        'admin_surveys_description',
        'admin_greetings',
        'admin_greetings_title',
        'admin_greetings_description',
        'admin_events',
        'admin_events_title',
        'admin_events_description',
        'admin_sos',
        'admin_sos_title',
        'admin_sos_description',
        'admin_live_stream',
        'admin_live_stream_title',
        'admin_live_stream_description',
        'new_donation',
        'new_donation_title',
        'new_donation_description',
        'new_events',
        'new_events_title',
        'new_events_description',
        'new_history',
        'new_history_title',
        'new_history_description',
        'new_music',
        'new_music_title',
        'new_music_description',
        'new_artist',
        'new_artist_title',
        'new_artist_description',
        'new_video_clips',
        'new_video_clips_title',
        'new_video_clips_description',
        'new_news',
        'new_news_title',
        'new_news_description',
        'new_videos',
        'new_videos_title',
        'new_videos_description',
        'new_votes',
        'new_votes_title',
        'new_votes_description',
        'new_ai_videos',
        'new_ai_videos_title',
        'new_ai_videos_description',
    ];
}
