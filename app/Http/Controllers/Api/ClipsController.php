<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Clips;
use App\Models\ClipTemplates;
use App\Models\Video;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use FFMpeg\Media\Clip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClipsController extends Controller
{
    public function index()
    {
        $videos = Clips::with('template')->get();
        return ResponseHelper::sendResponse($videos, 'Clips has been Fetch Successfully!');
    }

    public function get_templates()
    {
        $videos = ClipTemplates::all();
        return ResponseHelper::sendResponse($videos, 'Clips Templates has been Fetch Successfully!');
    }

    public function store_clips(Request $request)
    {
        $clip = new Clips();
        $clip->template_id = $request->template_id;
        $clip->thumbnail = $request->thumbnail;
        $clip->video = $request->video;
        $clip->audio = $request->audio;
        $clip->video_volume = $request->video_volume;
        $clip->audio_volume = $request->audio_volume;
        $clip->text = $request->text;
        $clip->text_properties = $request->text_properties;
        $clip->emoji = $request->emoji;
        $clip->share_with = $request->share_with;
        $clip->user_id = auth()->user()->id;
        $clip->save();
        return ResponseHelper::sendResponse($clip,'Clip has been Created Successfully!');
    }

    public function store_templates(Request $request)
    {
        $clip = new ClipTemplates();
        $clip->title = $request->title;
        $clip->json_paths = $request->json_paths[0] ?? '';
        $clip->json_sizes = $request->json_sizes[0] ?? '';
        $clip->json_name = $request->json_name[0] ?? '';
        $clip->save();
        if ($request->hasFile('json_file')) {
            $clip->json_file = Helpers::fileUpload($request->json_file, 'json_files');
        }
        if ($request->hasFile('video')) {
            $clip->video = Helpers::fileUpload($request->video, 'videos');
        }
        return back();
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        if (isset($video->images)) {
            foreach ($video->images as $video_file) {
                $image_path = 'public/' . $video_file['path']; // Relative path in storage
                // ✅ Check using Storage::exists()
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
            }
        }
        if (isset($video->video)) {
            foreach ($video->video as $video_file) {
                $image_path = 'public/' . $video_file['path']; // Relative path in storage
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
            }
        }
        if ($video->delete($video->id)) {
            return redirect()->route('manage_video')->with('success', 'Video Has been Deleted');
        } else {
            return redirect()->route('manage_video')->with('error', 'Failed to delete Video');
        }
    }
}
