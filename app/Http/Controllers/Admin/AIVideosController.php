<?php

namespace App\Http\Controllers\Admin;

use App\Models\AIVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AIVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ai_video = AIVideo::all();
        return view('content.ai_videos.index', compact('ai_video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.ai_videos.create');
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

        $ai_video = AIVideo::findOrNew($request->ai_video_id);
        $ai_video->title  = $request->title;
        $ai_video->source  = $request->source;
        $ai_video->is_comments  = $request->comments ?? 0;
        $ai_video->is_share  = $request->share ?? 0;
        $ai_video->is_emoji  = $request->emoji ?? 0;
        $ai_video->user_id = auth()->user()->id;

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
                $ai_video->video = $videos;
                $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
                $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
                $ai_video->thumbnail = $cleanedThumbnail;
            }
        }

        if ($ai_video->save()) {
            return redirect()->route('ai-videos.index')->with('success', 'AIVideo Has been inserted');
        } else {
            return redirect()->route('ai-videos.index')->with('error', 'Failed to add ai_video');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AIVideo  $ai_video
     * @return \Illuminate\Http\Response
     */
    public function show(AIVideo $ai_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AIVideo  $ai_video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ai_video = AIVideo::find($id);
        return view('content.ai_videos.edit', compact('ai_video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AIVideo  $ai_video
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

        $ai_video = AIVideo::find($request->id);
        $ai_video->title  = $request->title;
        $ai_video->is_comments  = $request->comments ?? 0;
        $ai_video->is_share  = $request->share ?? 0;
        $ai_video->is_emoji  = $request->emoji ?? 0;
        // $ai_video->user_id = auth()->user()->id;
        //   $ai_video->category_id = $request->category_id;
        //   $ai_video->description = $request->description;

        // if ($request->has('image_paths')) {
        //     foreach ($request->image_paths as $key => $image) {
        //         $images[] = [
        //             'path' => $image,
        //             'name' => $request->image_name[$key] ?? '',
        //             'size' => $request->image_sizes[$key] ?? '',
        //         ];
        //     }
        //     $ai_video->images = $images; // Store as an array of objects in MongoDB
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
        //     $ai_video->video = $videos; // Store as an array of objects in MongoDB
        //     $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
        //     $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
        //     $ai_video->thumbnail = $cleanedThumbnail;
        // }

        if ($ai_video->save()) {
            // $id = $ai_video->id;
            // for image
            // if($request->image_paths != null){
            //     foreach($request->image_paths  as $image){
            //         $post_gallery = new PostGallery();
            //         $post_gallery->ai_video_id = $id;
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
            //     $post_gallery->ai_video_id = $id;
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
            return redirect()->route('ai-videos.index')->with('success', 'AIVideo Has been inserted');
        } else {
            return redirect()->route('ai-videos.index')->with('error', 'Failed to add ai_video');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AIVideo  $ai_video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ai_video = AIVideo::find($id);
        if (isset($ai_video->images)) {
            foreach ($ai_video->images as $ai_video_file) {
                $image_path = 'public/' . $ai_video_file['path']; // Relative path in storage
                // ✅ Check using Storage::exists()
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
            }
        }
        if (isset($ai_video->video)) {
            foreach ($ai_video->video as $ai_video_file) {
                $image_path = 'public/' . $ai_video_file['path']; // Relative path in storage
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
            }
        }
        if ($ai_video->delete($ai_video->id)) {
            return redirect()->route('ai-videos.index')->with('success', 'AIVideo Has been Deleted');
        } else {
            return redirect()->route('ai-videos.index')->with('error', 'Failed to delete ai_video');
        }
    }
    public function status($id, $status)
    {
        $ai_video = AIVideo::find($id);
        $ai_video->status = $status;
        if ($ai_video->update()) {
            return redirect()->route('ai-videos.index')->with('success', 'Status Has been Updated');
        } else {
            return redirect()->route('ai-videos.index')->with('error', 'Status is not changed');
        }
    }

    public function deleteImage(Request $request, $id)
    {
        $ai_video = AIVideo::find($id);
        $ai_video->image = array_filter($ai_video->image, function ($path) use ($request) {
            return !($path === $request->path);
        });
        $ai_video->save();
        unlink(public_path('storage/' . $request->path));
        return [
            'status' => true
        ];
    }

    public function deleteVideo(Request $request, $id)
    {
        $ai_video = AIVideo::find($id);
        $ai_video->video = array_filter($ai_video->video, function ($path) use ($request) {
            return !($path === $request->path);
        });
        $ai_video->save();
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
