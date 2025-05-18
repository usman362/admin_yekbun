<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZarokVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TVController extends Controller
{
    public function zarokVideos()
    {
        return view('content.zarok-tv.videos');
    }

    public function zarokVideosStore(Request $request)
    {
        $validated = $request->validate([
            'video_file_name' => 'nullable',
            'video' => 'nullable',
            'thumbnail' => 'nullable',
            'video_file_size' => 'nullable',
            'video_file_length' => 'nullable',
            'status' => 'required',
        ]);

        try {
            $vc = new ZarokVideos();
            if ($request->video_id) {
                $vc = ZarokVideos::find($request->video_id);
            }
            $vc->video_file_name = Str::after($request->video, '___');
            $vc->video = $request->video;
            $vc->video_file_size = $request->video_file_size;
            $vc->video_file_length = $request->video_file_length;
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            $vc->save();
            return redirect()->back()->with('success', 'Video clip Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add video clip');
        }
    }
}
