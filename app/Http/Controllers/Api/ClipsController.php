<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\NotificationHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Clips;
use App\Models\ClipsViews;
use App\Models\ClipsLikes;
use App\Models\ClipTemplates;
use App\Models\Media;
use App\Models\NotificationCenter;
use App\Models\User;
use App\Models\UserVideo;
use App\Services\BunnyCDNService;
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
    public function index(Request $request)
    {
        $userId = Auth::id();
        $user = User::with(['friends', 'family'])->find($userId);
        $friendIds = $user->friends->pluck('user_id')->toArray();
        $familyIds = $user->family->pluck('user_id')->toArray();
        if (!empty($request->clip_id)) {
            $videos = Clips::with(['template', 'user', 'likes' => function ($likes) {
                $likes->with('user');
            }, 'views' => function ($views) {
                $views->with('user');
            }])->where(function ($query) use ($userId, $friendIds, $familyIds) {
                $query->where('user_id', $userId) // Own feeds
                    ->orWhere(function ($q) use ($friendIds) {
                        $q->whereIn('user_id', $friendIds)
                            ->whereIn('share_with', ['friends', 'friends & family']);
                    })
                    ->orWhere(function ($q) use ($familyIds) {
                        $q->whereIn('user_id', $familyIds)
                            ->whereIn('share_with', ['family', 'friends & family']);
                    });
            })->orderBy('created_at', 'desc')->find($request->clip_id);
        } else {
            $videos = Clips::with(['template', 'user', 'likes' => function ($likes) {
                $likes->with('user');
            }, 'views' => function ($views) {
                $views->with('user');
            }])->where(function ($query) use ($userId, $friendIds, $familyIds) {
                $query->where('user_id', $userId) // Own feeds
                    ->orWhere(function ($q) use ($friendIds) {
                        $q->whereIn('user_id', $friendIds)
                            ->whereIn('share_with', ['friends', 'friends & family']);
                    })
                    ->orWhere(function ($q) use ($familyIds) {
                        $q->whereIn('user_id', $familyIds)
                            ->whereIn('share_with', ['family', 'friends & family']);
                    });
            })->orderBy('created_at', 'desc')->get();
        }
        return ResponseHelper::sendResponse($videos, 'Clips has been Fetch Successfully!');
    }

    public function getMyClips(Request $request)
    {
        if (!empty($request->clip_id)) {
            $videos = Clips::with(['template', 'user', 'likes' => function ($likes) {
                $likes->with('user');
            }, 'views' => function ($views) {
                $views->with('user');
            }])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->find($request->clip_id);
        } else {
            $videos = Clips::with(['template', 'user', 'likes' => function ($likes) {
                $likes->with('user');
            }, 'views' => function ($views) {
                $views->with('user');
            }])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        }
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
            $thumbnail = Helpers::fileCDNUpload($request->thumbnail, 'images/thumbnails/clips');
        } else {
            $thumbnail = '';
        }
        $clip->thumbnail = $thumbnail;

        $uid = uniqid();
        $clip->emoji = $request->emoji;
        $clip->share_with = $request->share_with;
        $clip->user_id = Auth::id();
        $clip->text = $request->text;
        $clip->text_properties = $request->text_properties;
        $videoPath = $request->video;
        $originalNameWithoutExt = pathinfo($videoPath->getClientOriginalName(), PATHINFO_FILENAME);

        // dd($request->video);
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

        // $outputPath = storage_path('app/public/videos/clip_' . $uid . '.mp4');
        $outputPath = storage_path('app/public/videos/clip_' . $videoPath->getClientOriginalName());
        $text = $request->text ?? 'Default Text';
        $videoVolume = $request->video_volume ?? 0.8; // 80% of original video volume
        $audioVolume = $request->audio_volume ?? 0.5; // 50% of added background audio

        // 👉 Get font file name from request
        $fontFileName = $request->fontFamily; // Example: 'Roboto-Bold'
        $fontPath = $fontFileName ? public_path('fonts/' . $fontFileName . '.tff') : null;

        // FFmpeg command WITHOUT custom font
        $command = "ffmpeg -i {$videoPath} -i {$audioPath} -filter_complex " .
            "\"[1:a]volume={$audioVolume}[a1];[0:a]volume={$videoVolume}[a2];" .
            "[a1][a2]amix=inputs=2:duration=first[a]\" " .
            "-map 0:v -map \"[a]\" -shortest {$outputPath}";


        exec($command, $output, $return_var);

        if ($return_var === 0) {
            // dd(new \Illuminate\Http\File($outputPath));
            // Upload FFmpeg output to BunnyCDN
            $uploadedVideo = Helpers::fileCDNUpload2(
                new \Illuminate\Http\File($outputPath),   // <<< wrap local file
                'clips'
            );

            // Save CDN path in DB
            $clip->clip = $uploadedVideo;

            // Delete the local file after upload (optional)
            if (file_exists($outputPath)) {
                unlink($outputPath);
            }
        }

        $clip->likes_count = 0;
        $clip->views_count = 0;
        $clip->comments_count = 0;
        $clip->voice_comments_count = 0;

        $clip->save();
        // UserVideo::create([
        //     'user_id' => Auth::id(),
        //     'video' => Str::after($outputPath, 'public/')
        // ]);
        Helpers::userMedia(
            $clip->_id, //media_id
            $clip->clip, //uri
            $clip->comments_count, //commentCount
            $clip->voice_comments_count, //voiceCount
            $clip->likes_count, //emojisCount
            $clip->views_count, //seenCount
            $clip->user_id, //user_id
            $clip->text, //text
            $request->text_properties, //text_properties
            'clips' //type
        );
        $description = Auth::user()->name . ' ' . Auth::user()->last_name . ' has posted new Clip.';
        $users = User::where('_id', '!==', Auth::id())->whereNotNull('fcm_token')->whereIn('info_banner', ['banner', 'alert'])->get();
        if ($users) {
            foreach ($users as $user) {
                NotificationHelper::sendNotification($user->id, 'Clips Notification', $description);
                NotificationCenter::create([
                    'title' => 'Clips Notification',
                    'description' => $description,
                    'user_id' => $user->id,
                    'user_image' => $user->image ?? null,
                    'type' => 'clips',
                    'is_read' => 0,
                ]);
            }
        }
        return ResponseHelper::sendResponse($clip, 'Clip has been Created Successfully!');
    }

    public function downloadFromBunny($relativePath)
    {
        $temp = storage_path('app/temp/' . uniqid() . '_' . basename($relativePath));

        $fullUrl = env('BUNNY_CDN_URL') . ltrim($relativePath, '/');

        file_put_contents($temp, file_get_contents($fullUrl));

        return $temp;
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
            $clip->json_file = Helpers::fileCDNUpload($request->json_file, 'files/clip_template_json');
        }
        if ($request->hasFile('video')) {
            $clip->video = Helpers::fileCDNUpload($request->video, 'videos/clip_template');
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
            $bunny = new BunnyCDNService();
            $bunny->delete($clip->thumbnail);
        }
        if (isset($clip->clip)) {
            $bunny = new BunnyCDNService();
            $bunny->delete($clip->clip);
        }
        if ($clip->delete()) {
            $media = Media::where('media_id',$id)->first();
            if($media){
                $media->delete();
            }
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
        Helpers::userMedia(
            $clip->_id, //media_id
            $clip->clip, //uri
            $clip->comments_count, //commentCount
            $clip->voice_comments_count, //voiceCount
            $clip->likes_count, //emojisCount
            $clip->views_count, //seenCount
            $clip->user_id, //user_id
            $clip->text, //text
            $clip->text_properties, //text_properties
            'clips' //type
        );
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
            return ResponseHelper::sendResponse($clip, 'Clip Liked Successfully');
        }

        if ($request->filled('emoji')) {
            $existingLike->emoji = $request->emoji;
            $existingLike->save();
            $clip = Clips::find($request->clip_id);
            $clip->likes_count = $clip->likes->count();
            $clip->save();
            return ResponseHelper::sendResponse($clip, 'Like Updated Successfully');
        }

        $existingLike->delete();
        $clip = Clips::find($request->clip_id);
        $clip->likes_count = $clip->likes->count();
        $clip->save();

        Helpers::userMedia(
            $clip->_id, //media_id
            $clip->clip, //uri
            $clip->comments_count, //commentCount
            $clip->voice_comments_count, //voiceCount
            $clip->likes_count, //emojisCount
            $clip->views_count, //seenCount
            $clip->user_id, //user_id
            $clip->text, //text
            $clip->text_properties, //text_properties
            'clips' //type
        );
        return ResponseHelper::sendResponse([], 'Clip Unliked Successfully');
    }
}
