<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Feed;
use App\Models\News;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class FeedsController extends Controller
{

    public function index()
    {
        $feeds = Feed::orderBy('created_at', 'desc')->get();
        return response()->json(['feeds' => $feeds], 200);
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return response()->json(['news' => $news], 200);
    }

    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->json(['events' => $events], 200);
    }

    public function store_news(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'user_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_type' => 'nullable|integer|min:0',
            'start_date' => 'required|date|after:today',
            'end_date' => 'nullable|date|after:start_date',
            'comments' => 'nullable|integer|min:0',
            'voice_comments' => 'nullable|integer|min:0',
            'share' => 'nullable|integer|min:0',
            'emotion' => 'nullable|integer|min:0',
            'status' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->user_type = $request->user_type;
        $news->image = $request->image;
        $news->image_type = (int)$request->image_type;
        $news->start_date = $request->start_date;
        $news->end_date = $request->end_date;
        $news->comments = (int)$request->comments ?? 0;
        $news->voice_comments = (int)$request->voice_comments ?? 0;
        $news->share = (int)$request->share ?? 0;
        $news->emotion = (int)$request->emotion ?? 0;
        $news->status = $request->status;
        if ($news->save()) {
            return response()->json(['message' => 'News Feed has been created Successfully', 'news' => $news], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!'], 403);
        }
    }

    public function store_event(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        if ($event->save()) {
            return response()->json(['message' => 'Event has been created Successfully', 'event' => $event], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!'], 403);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_type' => 'required',
            'feed_type' => 'required',
        ]);
        $feeds = new Feed();

        if($request->feed_type == 'text'){
            $feeds->background_image = $request->background_image;
            $feeds->text_color = $request->text_color;
        }

        $feeds->grid_style = $request->grid_style;
        $feeds->image_type = count($request->file('images') ?? []) + count($request->file('videos') ?? []);
        $feeds->description = $request->description;
        $feeds->text_properties = $request->text_properties;
        $feeds->user_type = $request->user_type;
        $feeds->feed_type = $request->feed_type;
        // Arrays to store multiple file information
        $imagePaths = [];
        $imageNames = [];
        $imageLengths = [];
        $imageSizes = [];

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // $imagePaths[] = $image->store('images'); // Store the image and save the path
                $imageNames[] = $image->getClientOriginalName();
                $imageSizes[] = $image->getSize();
                $imageLengths[] = $this->getMediaDuration($image); // Optional, for media length
            }
            // Store arrays in the MongoDB document
            $feeds->image = $imagePaths;
            $feeds->image_file_name = $imageNames;
            $feeds->image_file_length = $imageLengths;
            $feeds->image_file_size = $imageSizes;
        }

        // Arrays to store multiple video information
        $videoPaths = [];
        $videoNames = [];
        $videoLengths = [];
        $videoSizes = [];

        // Handle multiple video uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videoPaths[] = $video->store('videos'); // Store the video and save the path
                $videoNames[] = $video->getClientOriginalName();
                $videoSizes[] = $video->getSize();
                $videoLengths[] = $this->getMediaDuration($video); // Optional, for media length
            }

            // Store arrays in the MongoDB document
            $feeds->video = $videoPaths;
            $feeds->video_file_name = $videoNames;
            $feeds->video_file_length = $videoLengths;
            $feeds->video_file_size = $videoSizes;
        }
        if ($feeds->save()) {
            return response()->json(['message' => 'Feed has been created Successfully', 'feed' => $feeds], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!'], 403);
        }
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
}
