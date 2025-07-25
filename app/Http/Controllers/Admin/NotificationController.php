<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Notifications::first();
        return view('content.apps.app-portal-notification', compact('notification'));
    }

    public function store(Request $request)
    {
        $notification = Notifications::updateOrCreate(
            ['_id' => $request->id],
            [
                'admin_system_info' => $request->admin_system_info == 'on' ? 'true' : 'false',
                'admin_system_info_title' => $request->admin_system_info_title,
                'admin_system_info_description' => $request->admin_system_info_description,
                'admin_donation' => $request->admin_donation == 'on' ? 'true' : 'false',
                'admin_donation_title' => $request->admin_donation_title,
                'admin_donation_description' => $request->admin_donation_description,
                'admin_surveys' => $request->admin_surveys == 'on' ? 'true' : 'false',
                'admin_surveys_title' => $request->admin_surveys_title,
                'admin_surveys_description' => $request->admin_surveys_description,
                'admin_greetings' => $request->admin_greetings == 'on' ? 'true' : 'false',
                'admin_greetings_title' => $request->admin_greetings_title,
                'admin_greetings_description' => $request->admin_greetings_description,
                'admin_events' => $request->admin_events == 'on' ? 'true' : 'false',
                'admin_events_title' => $request->admin_events_title,
                'admin_events_description' => $request->admin_events_description,
                'admin_sos' => $request->admin_sos == 'on' ? 'true' : 'false',
                'admin_sos_title' => $request->admin_sos_title,
                'admin_sos_description' => $request->admin_sos_description,
                'admin_live_stream' => $request->admin_live_stream == 'on' ? 'true' : 'false',
                'admin_live_stream_title' => $request->admin_live_stream_title,
                'admin_live_stream_description' => $request->admin_live_stream_description,
                'new_donation' => $request->new_donation == 'on' ? 'true' : 'false',
                'new_donation_title' => $request->new_donation_title,
                'new_donation_description' => $request->new_donation_description,
                'new_events' => $request->new_events == 'on' ? 'true' : 'false',
                'new_events_title' => $request->new_events_title,
                'new_events_description' => $request->new_events_description,
                'new_history' => $request->new_history == 'on' ? 'true' : 'false',
                'new_history_title' => $request->new_history_title,
                'new_history_description' => $request->new_history_description,
                'new_music' => $request->new_music == 'on' ? 'true' : 'false',
                'new_music_title' => $request->new_music_title,
                'new_music_description' => $request->new_music_description,
                'new_artist' => $request->new_artist == 'on' ? 'true' : 'false',
                'new_artist_title' => $request->new_artist_title,
                'new_artist_description' => $request->new_artist_description,
                'new_video_clips' => $request->new_video_clips == 'on' ? 'true' : 'false',
                'new_video_clips_title' => $request->new_video_clips_title,
                'new_video_clips_description' => $request->new_video_clips_description,
                'new_news' => $request->new_news == 'on' ? 'true' : 'false',
                'new_news_title' => $request->new_news_title,
                'new_news_description' => $request->new_news_description,
                'new_videos' => $request->new_videos == 'on' ? 'true' : 'false',
                'new_videos_title' => $request->new_videos_title,
                'new_videos_description' => $request->new_videos_description,
                'new_votes' => $request->new_votes == 'on' ? 'true' : 'false',
                'new_votes_title' => $request->new_votes_title,
                'new_votes_description' => $request->new_votes_description,
                'new_ai_videos' => $request->new_ai_videos == 'on' ? 'true' : 'false',
                'new_ai_videos_title' => $request->new_ai_videos_title,
                'new_ai_videos_description' => $request->new_ai_videos_description,
            ]
        );
        return redirect(route('app.portal.notification'));
    }
}
