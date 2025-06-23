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
        if ($request->hasFile('thumbnail')) {
            $thumbnail =  Helpers::fileUpload($request->thumbnail, 'clips-thumbnail');
        } else {
            $thumbnail = '';
        }
        $clip->thumbnail = $thumbnail;
        // if ($request->hasFile('video')) {
        //     $video =  Helpers::fileUpload($request->video, 'clips-video');
        // } else {
        //     $video = '';
        // }
        $uid = uniqid();
        $clip->emoji = $request->emoji;
        $clip->share_with = $request->share_with;
        $clip->user_id = auth()->user()->id;

        $videoPath = $request->video;
        $audioPath = storage_path('app/public/' . $request->audio);
        $outputPath = storage_path('app/public/videos/clip_' . $uid . '.mp4');

        $text = $request->text ?? 'Default Text';
        $videoVolume = $request->video_volume ?? 0.8; // 80% of original video volume
        $audioVolume = $request->audio_volume ?? 0.5; // 50% of added background audio

        $x = $request->x ?? '(w-text_w)/2';
        $y = $request->y ?? '(h-text_h)/2';
        $fontSize = $request->fontSize ?? 36;
        $fontColor = $request->color ?? 'white';
        // Escape text properly for shell
        $escapedText = escapeshellarg($text);

        // 👉 Get font file name from request
        $fontFileName = $request->fontFamily; // Example: 'Roboto-Bold'
        $fontPath = $fontFileName ? public_path('fonts/' . $fontFileName . '.tff') : null;

        // Optional: Validate file exists
        if ($fontPath && !file_exists($fontPath)) {
            return response()->json(['error' => 'Font file not found.'], 400);
        }

        // Fontfile option
        $fontOption = $fontPath ? "fontfile={$fontPath}:" : '';

        // FFmpeg command WITHOUT custom font
         $command = "ffmpeg -i {$videoPath} -i {$audioPath} -filter_complex " .
        "\"[0:v]drawtext={$fontOption}text={$escapedText}:fontcolor={$fontColor}:fontsize={$fontSize}:x={$x}:y={$y}[v];" .
        "[1:a]volume={$audioVolume}[a1];[0:a]volume={$videoVolume}[a2];" .
        "[a1][a2]amix=inputs=2:duration=first[a]\" " .
        "-map \"[v]\" -map \"[a]\" -shortest {$outputPath}";

        exec($command, $output, $return_var);

        if ($return_var === 0) {
            $clip->clip = $outputPath;
        }
        // else {
        //     return response()->json(['error' => 'FFmpeg processing failed.'], 500);
        // }
        $clip->save();
        return ResponseHelper::sendResponse($clip, 'Clip has been Created Successfully!');
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
