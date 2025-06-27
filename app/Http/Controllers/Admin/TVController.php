<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZarokStories;
use App\Models\ZarokVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TVController extends Controller
{
    public function zarokVideos()
    {
        $videos = ZarokVideos::all();
        return view('content.zarok-tv.videos',compact('videos'));
    }

    public function zarokVideosStore(Request $request)
    {
        try {
            $vc = new ZarokVideos();
            if ($request->video_id) {
                $vc = ZarokVideos::find($request->video_id);
            }
            $vc->video_file_name = $request->video_name[0];
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            $vc->save();
            return redirect()->back()->with('success', 'Video clip Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add video clip');
        }
    }

    public function zarokStories()
    {
        $videos = ZarokStories::all();
        return view('content.zarok-tv.stories',compact('videos'));
    }

    public function zarokStoriesStore(Request $request)
    {
        try {
            $vc = new ZarokStories();
            if ($request->video_id) {
                $vc = ZarokStories::find($request->video_id);
            }
            $vc->video_file_name = $request->video_name[0];
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            $vc->save();
            return redirect()->back()->with('success', 'Stories Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add video clip');
        }
    }
}
