<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Helpers\ResponseHelper;
use App\Models\Artist;
use App\Models\VideoClip;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\MusicCategory;
use App\Models\Notifications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VideoClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $video  = VideoClip::with('music_category')->get();
        $music_category  = MusicCategory::get();
        $artists = Artist::get();
        return view('content.video_clips.index', compact('video', 'music_category', 'artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //     return view('content.video_clips.create' , compact('music_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->dd();
        $validated = $request->validate([
            'video_file_name' => 'nullable',
            'artist_id' => 'required',
            'video' => 'nullable',
            'thumbnail' => 'nullable',
            'video_file_size' => 'nullable',
            'video_file_length' => 'nullable',
            'status' => 'required',
        ]);

        try {
            $vc = VideoClip::updateOrCreate(['_id' => $request->video_id],[
                'artist_id' => $request->artist_id,
                'status' => $request->status,
            ]);
            if($request->video){
                $vc->video_file_name = Str::after($request->video, '___');
                $vc->video = $request->video;
                $vc->video_file_size = $request->video_file_size;
                $vc->video_file_length = $request->video_file_length;
                $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
                $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
                $vc->thumbnail = $cleanedThumbnail;
                $vc->save();
            }

            $notification = Notifications::first();
            if ($notification->new_video_clips == 'true') {
                try {
                    $users = User::whereNotNull('fcm_token')->where('new_music', 'true')->whereIn('info_banner', ['banner', 'alert'])->get();
                    if ($users) {
                        foreach ($users as $user) {
                            NotificationHelper::sendNotification($user->id, 'Clips Notification', 'New Video Clip ' . $vc->video_file_name . ' has been added!');
                        }
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with('success', 'Video clip Has been added');
                }
            }
            return redirect()->back()->with('success', 'Video clip Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add video clip');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(VideoClip $music)
    {
        // dd("ok");
        $artists = Artist::get();
        $content_type = 'video-clip';
        // dd($artists);
        return view('content.video_clips.video-clip-detail', compact('content_type', 'artists'));
        //
    }

    public function detail($music_id)
    {
        $video_clips = VideoClip::get();
        $video_clips->transform(function ($video_clip) {
            $formattedDate = Carbon::parse($video_clip->created_at)->format('j M Y');
            $video_clip->upload_date = str_replace([' 0', '-0'], [' ', '-'], $formattedDate);
            return $video_clip;
        });
        $music_category  = MusicCategory::get();
        $artists = Artist::get();
        $albums = Album::get();
        // dd($artists);
        // $artists = [];
        return view('content.video_clips.video-clip-detail', compact('video_clips', 'music_category', 'artists', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoClip::findorFail($id);
        $music_category = MusicCategory::get();
        return view('content.video_clips.edit', compact('music_category', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $video = VideoClip::findorFail($id);
        $video->name = $request->title;
        $video->category_id = $request->category_id;
        $video->artist_id = $request->artist_id;
        $video->video = $request->video_paths ?? [];
        $video->status = $request->status;
        if ($video->update()) {
            return redirect()->back()->with('success', 'Video Has been Updated');
        } else {
            return redirect()->back()->with('success', 'Video not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = VideoClip::findorFail($id);
        // dd(public_path('storage/' . $video->video));

        if ($video->video) {
            $file_path = public_path('storage/' . $video->video);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }


        if ($video->thumbnail) {
            $file_path = public_path('storage/' . $video->thumbnail);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        if ($video->delete()) {
            //    return redirect()->route('video-clips.index')->with('success', 'Video  Has been Deleted');
            return ResponseHelper::sendResponse($video, 'Video Clip has been Deleted!');
        } else {
            //    return redirect()->route('video-clips.index')->with('error', 'Video not Deleted');
            return ResponseHelper::sendResponse($video, 'Error to Delete Video Clip!', false, 403);
        }
    }
    public function status($id, $status)
    {
        $video = VideoClip::find($id);

        $video->status = $status;
        if ($video->update()) {
            return redirect()->route('video-clips.index')->with('success', 'Status Has been Updated');
        } else {
            return redirect()->route('video-clips.index')->with('error', 'Status is not changed');
        }
    }

    public function deleteVideo(Request $request, $id)
    {
        $video = VideoClip::find($id);
        $video->video = array_filter($video->video, function ($path) use ($request) {
            return !($path === $request->path);
        });
        $video->save();
        unlink(public_path('storage/' . $request->path));
        return [
            'status' => true
        ];
    }
}
