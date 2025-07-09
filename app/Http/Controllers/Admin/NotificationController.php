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
                'admin_donation' => $request->admin_donation == 'on' ? 'true' : 'false',
                'admin_surveys' => $request->admin_surveys == 'on' ? 'true' : 'false',
                'admin_greetings' => $request->admin_greetings == 'on' ? 'true' : 'false',
                'admin_events' => $request->admin_events == 'on' ? 'true' : 'false',
                'admin_sos' => $request->admin_sos == 'on' ? 'true' : 'false',
                'admin_live_stream' => $request->admin_live_stream == 'on' ? 'true' : 'false',
                'new_donation' => $request->new_donation == 'on' ? 'true' : 'false',
                'new_events' => $request->new_events == 'on' ? 'true' : 'false',
                'new_history' => $request->new_history == 'on' ? 'true' : 'false',
                'new_music' => $request->new_music == 'on' ? 'true' : 'false',
                'new_artist' => $request->new_artist == 'on' ? 'true' : 'false',
                'new_video_clips' => $request->new_video_clips == 'on' ? 'true' : 'false',
                'new_news' => $request->new_news == 'on' ? 'true' : 'false',
                'new_videos' => $request->new_videos == 'on' ? 'true' : 'false',
                'new_votes' => $request->new_votes == 'on' ? 'true' : 'false',
                'new_ai_videos' => $request->new_ai_videos == 'on' ? 'true' : 'false',
            ]
        );
        return redirect(route('app.portal.notification'));
    }
}
