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
            ['id' => $request->id],
            [
                'new_donation' => $request->new_donation == 'on' ? 'true' : 'false',
                'new_events' => $request->new_events == 'on' ? 'true' : 'false',
                'new_history' => $request->new_history == 'on' ? 'true' : 'false',
                'new_music' => $request->new_music == 'on' ? 'true' : 'false',
                'new_artist' => $request->new_artist == 'on' ? 'true' : 'false',
                'new_video_clips' => $request->new_video_clips == 'on' ? 'true' : 'false',
                'new_news' => $request->new_news == 'on' ? 'true' : 'false',
                'new_videos' => $request->new_videos == 'on' ? 'true' : 'false',
                'new_votes' => $request->new_votes == 'on' ? 'true' : 'false',
            ]
        );
        return redirect(route('app.portal.notification'));
    }
}
