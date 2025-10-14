<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Clips;
use App\Models\ClipsViews;
use App\Models\ClipsLikes;
use App\Models\ClipTemplates;
use App\Models\UserVideo;
use App\Models\Video;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use FFMpeg\Media\Clip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClipsController extends Controller
{
    public function index()
    {
        $videos = Clips::with(['template', 'user', 'likes', 'views'])->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($videos, 'Clips has been Fetch Successfully!');
    }

    public function get_templates()
    {
        $videos = ClipTemplates::all();
        return ResponseHelper::sendResponse($videos, 'Clips Templates has been Fetch Successfully!');
    }

    public function store_clips(Request $request)
    {
        $request->validate([
            'video' => 'required|file'
        ]);

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
        $clip->user_id = Auth::id();
        $clip->text = $request->text;
        $clip->text_properties = $request->text_properties;
        $videoPath = $request->video;
        $audioPath = public_path('audios/empty.mp3');
        if ($request->hasFile('audio')) {
            // If uploading a new file
            $audioPath = $request->audio;
        } else {
            // If no new file, check if the given audio exists in storage
            if (!empty($request->audio) && Storage::exists('public/' . $request->audio)) {
                $audioPath = storage_path('app/public/' . $request->audio);
            } else {
                // fallback audio
                $audioPath = public_path('audios/empty.mp3');
            }
        }
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
        // if ($fontPath && !file_exists($fontPath)) {
        //     return response()->json(['error' => 'Font file not found.'], 400);
        // }

        // Fontfile option
        $fontOption = $fontPath ? "fontfile={$fontPath}:" : '';

        // FFmpeg command WITHOUT custom font
        $command = "ffmpeg -i {$videoPath} -i {$audioPath} -filter_complex " .
            "\"[1:a]volume={$audioVolume}[a1];[0:a]volume={$videoVolume}[a2];" .
            "[a1][a2]amix=inputs=2:duration=first[a]\" " .
            "-map 0:v -map \"[a]\" -shortest {$outputPath}";


        exec($command, $output, $return_var);

        if ($return_var === 0) {
            $clip->clip = Str::after($outputPath, 'public/');
        }
        // else {
        //     return response()->json(['error' => 'FFmpeg processing failed.'], 500);
        // }
        $clip->save();
        UserVideo::create([
            'user_id' => Auth::id(),
            'video' => Str::after($outputPath, 'public/')
        ]);
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
        $clip = Clips::find($id);
        if (!$clip) {
            return ResponseHelper::sendResponse([], 'Clip Not Found', false, 401);
        }
        if (isset($clip->thumbnail)) {
            if (Storage::exists($clip->thumbnail)) {
                Storage::delete($clip->thumbnail);
            }
        }
        if (isset($clip->clip)) {
            if (Storage::exists($clip->clip)) {
                Storage::delete($clip->clip);
            }
        }
        if ($clip->delete()) {
            return ResponseHelper::sendResponse([], 'Clip has been Deleted Successfully');
        } else {
            return ResponseHelper::sendResponse([], 'Failed to Delete Clip', false, 401);
        }
    }

    public function view_clips(Request $request)
    {
        if (!$request->clip_id) {
            return ResponseHelper::sendResponse([], 'Clip Id is Required', false, 401);
        }
        $user_id = Auth::id();
        $clip_id = $request->clip_id;
        $existingView = ClipsViews::where('user_id', $user_id)->where('clip_id', $clip_id)->first();
        if (!$existingView) {
            $views = new ClipsViews();
            $views->user_id = $user_id;
            $views->clip_id = $request->clip_id;
            $views->save();
        }
        $clip = Clips::find($request->clip_id);
        $clip->views_count = $clip->views->count();
        $clip->save();
        return ResponseHelper::sendResponse([], 'Clip Viewed Successfully');
    }

    public function like_clips(Request $request)
    {
        if (!$request->clip_id) {
            return ResponseHelper::sendResponse([], 'Clip Id is Required', false, 401);
        }

        $user_id = Auth::id();
        $clip_id = $request->clip_id;

        // Check if user already liked this clip
        $existingLike = ClipsLikes::where('user_id', $user_id)
            ->where('clip_id', $clip_id)
            ->first();

        if (!$existingLike) {
            $like = new ClipsLikes();
            $like->user_id = $user_id;
            $like->clip_id = $clip_id;
            $like->emoji = $request->emoji ?? null;
            $like->save();
            $clip = Clips::find($request->clip_id);
            $clip->likes_count = $clip->likes->count();
            $clip->save();
            return ResponseHelper::sendResponse([], 'Clip Liked Successfully');
        }

        if ($request->filled('emoji')) {
            $existingLike->emoji = $request->emoji;
            $existingLike->save();
            $clip = Clips::find($request->clip_id);
            $clip->likes_count = $clip->likes->count();
            $clip->save();
            return ResponseHelper::sendResponse([], 'Like Updated Successfully');
        }

        $existingLike->delete();
        $clip = Clips::find($request->clip_id);
        $clip->likes_count = $clip->likes->count();
        $clip->save();
        return ResponseHelper::sendResponse([], 'Clip Unliked Successfully');
    }
}
