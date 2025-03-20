<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Models\History;
use App\Models\PostGallery;
use Illuminate\Http\Request;
use App\Models\HistoryCategory;
use App\Http\Controllers\Controller;
use App\Models\HistoryComments;
use App\Models\HistoryLikes;
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
        $history = History::with('history_category')->get();
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
        $test = $request->validate([
            'title' => 'required',
            // 'category_id'=>'required',
            'description' => 'nullable',
            // 'image'=> 'required',
            //  'video_path'=> 'string'
        ]);

        $history = new History();
        $history->title  = $request->title;
        $history->is_comments  = $request->comments ?? 0;
        $history->is_share  = $request->share ?? 0;
        $history->is_emoji  = $request->emoji ?? 0;
        $history->user_id = auth()->user()->id;
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

        if ($request->has('video_paths')) {
            foreach ($request->video_paths as $key => $video) {
                $videos[] = [
                    'path' => $video,
                    'name' => $request->video_name[$key] ?? '',
                    'duration' => $request->video_durations[$key] ?? '',
                    'size' => $request->video_sizes[$key] ?? '',
                ];
            }
            $history->video = $videos; // Store as an array of objects in MongoDB
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $history->thumbnail = $cleanedThumbnail;
        }

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
        $request->validate([
            'title' => 'required',
            // 'category_id'=>'required',
            'description' => 'nullable',
            // 'image'=> 'required',
            //  'video_path'=> 'string'
        ]);
        $history = History::find($id);
        $history->title  = $request->title;
        $history->description  = $request->description;
        //$history->language  = $request->language;
        $history->category_id = $request->category_id;
        $history->image = $request->image_paths ?? [];
        $history->video = $request->video_paths ?? [];
        if ($history->update()) {
            return redirect()->route('history.index')->with('success', 'History Has been Updated');
        } else {
            return redirect()->route('history.index')->with('error', 'Failed to update history');
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
                $image_path = 'public/' . $history_file['path']; // Relative path in storage
                // ✅ Check using Storage::exists()
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
            }
        }
        if (isset($history->video)) {
            foreach ($history->video as $history_file) {
                $image_path = 'public/' . $history_file['path']; // Relative path in storage
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path); // ✅ Delete the file properly
                }
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

    public function getComments(Request $request)
    {
        $request->validate(['history_id' => 'required']);

        try {

            $comments = HistoryComments::with(['child_comments' => function ($q) {
                $q->with(['child_comments' => function ($q) {
                    $q->with(['user' =>  function ($q) {
                        $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                    }]);
                }, 'user' =>  function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }]);
            }, 'user' => function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])
                ->where('history_id', $request->history_id)->where('parent_id', null)->get();

            $user = User::select('name', 'last_name', 'email', 'dob', 'image', 'username')->find(auth()->id());
            $feed = History::with(['user' => function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])->find($request->history_id);

            $like = HistoryLikes::where('user_id', $user->id)->where('history_id', $request->history_id)->first();

            if ($like) {
                $liked = true;
            } else {
                $liked = false;
            }

            $likeCount = HistoryLikes::where('history_id', $request->history_id)->count();
            $commentCount = HistoryComments::where('history_id', $request->history_id)->count();

            $data = [
                'comments' => $comments,
                'comments_count' => $commentCount,
                'feed' => $feed,
                'liked' => $liked,
                'like_count' => $likeCount,
                'user' => $user
            ];

            return ResponseHelper::sendResponse($data, 'Comment Fetch successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to fetch Comment!', false, 403);
        }
    }

    public function storeComments(Request $request)
    {
        $request->validate(['comment' => 'required|string']);

        try {
            $comment = HistoryComments::create([
                'user_id' => auth()->id(),
                'history_id' => $request->history_id,
                'comment' => $request->comment,
                'parent_id' => $request->parent_id ?? null,
                'status' => 1
            ]);

            $comments = HistoryComments::with(['child_comments' => function ($q) {
                $q->with(['child_comments' => function ($q) {
                    $q->with(['user' =>  function ($q) {
                        $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                    }]);
                }, 'user' =>  function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }]);
            }, 'user' => function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])
                ->where('history_id', $request->history_id)->where('parent_id', null)->get();

            $user = User::select('name', 'last_name', 'email', 'dob', 'image', 'username')->find(auth()->id());
            $commentCount = HistoryComments::where('history_id', $request->history_id)->count();
            $like = HistoryLikes::where('user_id', $user->id)->where('history_id', $request->history_id)->first();

            if ($like) {
                $liked = true;
            } else {
                $liked = false;
            }

            $likeCount = HistoryLikes::where('history_id', $request->history_id)->count();

            $data = [
                'comments' => $comments,
                'comments_count' => $commentCount,
                'liked' => $liked,
                'like_count' => $likeCount,
                'user' => $user
            ];

            return ResponseHelper::sendResponse($data, 'Comment has been successfully sent');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to send Comment!', false, 403);
        }
    }

    public function feedLike(Request $request)
    {
        $request->validate([
            'history_id' => 'required'
        ]);

        $user = Auth::user();
        $postId = $request->history_id;

        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not authenticated!', false, 403);
        }

        $like = HistoryLikes::where('user_id', $user->id)->where('history_id', $postId)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            HistoryLikes::create([
                'user_id' => $user->id,
                'history_id' => $postId,
            ]);
            $liked = true;
        }

        $likeCount = HistoryLikes::where('history_id', $postId)->count();

        $data = [
            'liked' => $liked,
            'like_count' => $likeCount
        ];
        return ResponseHelper::sendResponse($data, 'Like has been successfully Saved');
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
            $thumbnailPath = 'history/' . pathinfo($videoPath, PATHINFO_FILENAME) . "_thumb_{$index}.jpg";

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
