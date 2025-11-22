<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Helpers\ResponseHelper;
use App\Models\History;
use App\Models\PostGallery;
use Illuminate\Http\Request;
use App\Models\HistoryCategory;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\HistoryComments;
use App\Models\HistoryLikes;
use App\Models\NotificationCenter;
use App\Models\Notifications;
use App\Models\User;
use Exception;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('history.published') && auth()->user()->can('history.unpublished')) {
            // Can view both
            $history = History::with('history_category')->get();
        } elseif (auth()->user()->can('history.published')) {
            // Can view only published
            $history = History::with('history_category')->where('status', '1')->get();
        } elseif (auth()->user()->can('history.unpublished')) {
            // Can view only unpublished
            $history = History::with('history_category')->where('status', '0')->get();
        } else {
            // No permission
            return redirect('/');
        }
        $history_category = HistoryCategory::get();
        return view('content.history.index', compact('history', 'history_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.history.create', compact('history_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $history = History::findOrNew($request->history_id);
        $history->title  = $request->title;
        $history->source  = $request->source;
        $history->status  = $request->status;
        $history->is_comments  = $request->comments ?? 0;
        $history->is_share  = $request->share ?? 0;
        $history->is_emoji  = $request->emoji ?? 0;
        $history->user_id = auth()->user()->id;

        if (!empty($request->thumbnail)) {
            if ($request->has('video_paths')) {
                foreach ($request->video_paths as $key => $video) {
                    $videos[] = [
                        'path' => $video,
                        'name' => $request->video_name[$key] ?? '',
                        'duration' => $request->video_durations[$key] ?? '',
                        'size' => $request->video_sizes[$key] ?? '',
                    ];
                }
                $history->video = $videos;
                $cleanedThumbnail = Str::after($request->thumbnail, env('BUNNY_CDN_URL'));
                $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
                $history->thumbnail = $cleanedThumbnail;
            }
        }

        if ($history->save()) {

            $notification = Notifications::first();
            $notify = AdminNotification::first();
            $description = str_replace(
                ["[name]"],
                [$request->title],
                $notification->new_history_description
            );
            if ($notification->new_history == 'true' && $request->status == '1' && $notify->history == 1) {
                try {
                    $users = User::whereNotNull('fcm_token')->where('new_history', 'true')->whereIn('info_banner', ['banner', 'alert'])->get();
                    if ($users) {
                        foreach ($users as $user) {
                            NotificationHelper::sendNotification($user->id, $notification->new_history_title, $description);
                            NotificationCenter::create([
                                'title' => $notification->new_history_title,
                                'description' => $description,
                                'user_id' => $user->id,
                                'user_image' => $user->image ?? null,
                                'type' => 'history',
                                'is_read' => 0,
                            ]);
                        }
                    }
                } catch (\Exception $e) {
                    return redirect()->route('history.index')->with('success', 'History Has been inserted');
                }
            }
            return redirect()->route('history.index')->with('success', 'History Has been inserted');
        } else {
            return redirect()->route('history.index')->with('error', 'Failed to add history');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history = History::find($id);
        $history_category = HistoryCategory::get();
        return view('content.history.edit', compact('history', 'history_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->all();
        $test = $request->validate([
            'title' => 'required',
            // 'category_id'=>'required',
            'description' => 'nullable',
            // 'image'=> 'required',
            //  'video_path'=> 'string'
        ]);

        $history = History::find($request->id);
        $history->title  = $request->title;
        $history->status  = $request->status;
        $history->is_comments  = $request->comments ?? 0;
        $history->is_share  = $request->share ?? 0;
        $history->is_emoji  = $request->emoji ?? 0;
        // $history->user_id = auth()->user()->id;
        //   $history->category_id = $request->category_id;
        //   $history->description = $request->description;

        // if ($request->has('image_paths')) {
        //     foreach ($request->image_paths as $key => $image) {
        //         $images[] = [
        //             'path' => $image,
        //             'name' => $request->image_name[$key] ?? '',
        //             'size' => $request->image_sizes[$key] ?? '',
        //         ];
        //     }
        //     $history->images = $images; // Store as an array of objects in MongoDB
        // }

        // if ($request->has('video_paths')) {
        //     foreach ($request->video_paths as $key => $video) {
        //         $videos[] = [
        //             'path' => $video,
        //             'name' => $request->video_name[$key] ?? '',
        //             'duration' => $request->video_durations[$key] ?? '',
        //             'size' => $request->video_sizes[$key] ?? '',
        //         ];
        //     }
        //     $history->video = $videos; // Store as an array of objects in MongoDB
        //     $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
        //     $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
        //     $history->thumbnail = $cleanedThumbnail;
        // }

        if ($history->save()) {
            // $id = $history->id;
            // for image
            // if($request->image_paths != null){
            //     foreach($request->image_paths  as $image){
            //         $post_gallery = new PostGallery();
            //         $post_gallery->history_id = $id;
            //         $post_gallery->media_url = url('/') . '/storage/' . $image;
            //         $post_gallery->media_type = 0;
            //         $post_gallery->user_id = $request->userId;
            //         if($request->has('post_id')){
            //             $post_gallery->post_id = $request->post_id;
            //         }
            //         if($request->has('vote_id')){
            //             $post_gallery->vote_id = $request->vote_id;
            //         }
            //         if($request->has('news_id')){
            //             $post_gallery->news_id = $request->news_id;
            //         }
            //         $post_gallery->save();
            //     }
            // }

            // for video
            // if($request->video_paths != null){


            // foreach($request->video_paths  as $video){
            //     $post_gallery = new PostGallery();
            //     $post_gallery->history_id = $id;
            //     $post_gallery->media_url = url('/') . '/storage/' . $video;
            //     $post_gallery->media_type = 1;
            //     $post_gallery->user_id = $request->userId;
            //     if($request->has('post_id')){
            //         $post_gallery->post_id = $request->post_id;
            //     }
            //     if($request->has('vote_id')){
            //         $post_gallery->vote_id = $request->vote_id;
            //     }
            //     if($request->has('news_id')){
            //         $post_gallery->news_id = $request->news_id;
            //     }
            //     $post_gallery->save();
            // }
            // }
            return redirect()->route('history.index')->with('success', 'History Has been inserted');
        } else {
            return redirect()->route('history.index')->with('error', 'Failed to add history');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::find($id);
        if (isset($history->images)) {
            foreach ($history->images as $history_file) {
                $bunny = new \App\Services\BunnyCDNService();
                $deleted = $bunny->delete($history_file['path']);
            }
        }
        if (isset($history->video)) {
            foreach ($history->video as $history_file) {
                $bunny = new \App\Services\BunnyCDNService();
                $deleted = $bunny->delete($history_file['path']);
            }
        }
        if ($history->delete($history->id)) {
            return redirect()->route('history.index')->with('success', 'History Has been Deleted');
        } else {
            return redirect()->route('history.index')->with('error', 'Failed to delete history');
        }
    }
    public function status($id, $status)
    {
        $history = History::find($id);
        $history->status = $status;
        if ($history->update()) {
            return redirect()->route('history.index')->with('success', 'Status Has been Updated');
        } else {
            return redirect()->route('history.index')->with('error', 'Status is not changed');
        }
    }

    public function deleteImage(Request $request, $id)
    {
        $history = History::find($id);
        $history->image = array_filter($history->image, function ($path) use ($request) {
            return !($path === $request->path);
        });
        $history->save();
        unlink(public_path('storage/' . $request->path));
        return [
            'status' => true
        ];
    }

    public function deleteVideo(Request $request, $id)
    {
        $history = History::find($id);
        $history->video = array_filter($history->video, function ($path) use ($request) {
            return !($path === $request->path);
        });
        $history->save();
        unlink(public_path('storage/' . $request->path));
        return [
            'status' => true
        ];
    }

    private function getMediaDuration($file)
    {
        // Initialize FFMpeg
        $ffmpeg = FFMpeg::create();
        // Open the media file (you need to get the real path of the uploaded file)
        $media = $ffmpeg->open($file->getRealPath());
        // Get the format of the file to retrieve metadata, including the duration
        $format = $media->getFormat();
        // Get duration in seconds (or any other format you want)
        $duration = $format->get('duration'); // Duration is in seconds

        return $duration;
    }

    public function generateThumbnail(Request $request)
    {
        $thumbnail = $this->generateThumbnailFromPath($request->video_path, $request->duration);
        return response()->json(['thumbnail' => $thumbnail], 200);
    }

    private function generateThumbnailFromPath($videoPath, $duration)
    {
        $defaultThumbnail = asset('images/def.jpg');
        $bunny = new \App\Services\BunnyCDNService();

        try {
            $ffmpeg = FFMpeg::create();

            // CDN video full path
            $fullPath = env('BUNNY_CDN_URL').$videoPath;

            // timestamps
            $timestamps = [
                round($duration * 0.25),
                round($duration * 0.40),
                round($duration * 0.75),
            ];

            $thumbnails = [];

            foreach ($timestamps as $index => $time) {

                // Thumbnail path on CDN
                $thumbnailCdnPath = 'thumbnails/' . pathinfo($videoPath, PATHINFO_FILENAME)
                                    . "_thumb_{$index}.jpg";

                // Temporary local file for FFMPEG
                $localTemp = storage_path('app/tmp_thumb_' . uniqid() . '.jpg');

                // Extract frame
                $video = $ffmpeg->open($fullPath);
                $frame = $video->frame(TimeCode::fromSeconds($time));
                $frame->save($localTemp);

                // Read file content
                $content = file_get_contents($localTemp);
                $mime = mime_content_type($localTemp);

                // Upload to BunnyCDN
                $bunny->upload(
                    'thumbnails',                             // folder
                    pathinfo($thumbnailCdnPath, PATHINFO_BASENAME), // filename only
                    $content,
                    $mime
                );

                // Delete local temp file
                @unlink($localTemp);

                // Only return path like: thumbnails/video_thumb_0.jpg
                $thumbnails[] = env('BUNNY_CDN_URL').$thumbnailCdnPath;
            }

            return $thumbnails;
        } catch (\Exception $e) {
            return [$defaultThumbnail, $defaultThumbnail, $defaultThumbnail];
        }
    }

    private function generateThumbnailFromPath_old($videoPath, $duration)
    {
        // Initialize FFMpeg
        $ffmpeg = FFMpeg::create();
        $fullPath = Storage::path('public/' . $videoPath);

        // Get 3 timestamps (25%, 50%, 75% of the duration)
        $timestamps = [
            round($duration * 0.25),
            round($duration * 0.40),
            round($duration * 0.75),
        ];

        $thumbnails = [];

        foreach ($timestamps as $index => $time) {
            // Generate unique thumbnail name
            $thumbnailPath = 'thumbnails/' . pathinfo($videoPath, PATHINFO_FILENAME) . "_thumb_{$index}.jpg";

            // Delete if already exists
            if (Storage::exists($thumbnailPath)) {
                Storage::delete($thumbnailPath);
            }

            // Open the video and capture frame
            $video = $ffmpeg->open($fullPath);
            $frame = $video->frame(TimeCode::fromSeconds($time));
            $frame->save(storage_path('app/public/' . $thumbnailPath));

            // Add to response array
            $thumbnails[] = asset('storage/' . $thumbnailPath);
        }
        return $thumbnails;
    }
}
