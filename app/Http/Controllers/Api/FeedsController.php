<?php

namespace App\Http\Controllers\Api;

use App\Events\AdminFeedsComments;
use App\Events\HistoryComments;
use App\Events\UserFeedsComments;
use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentsLike;
use App\Models\Event;
use App\Models\Feed;
use App\Models\FeedComments;
use App\Models\FeedLikes;
use App\Models\History;
use App\Models\News;
use App\Models\PopFeeds;
use Carbon\Carbon;
use Exception;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class FeedsController extends Controller
{

    public function index(Request $request)
    {

        // Get authenticated user's latest feed
        $authFeed = Feed::with('user')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!empty($request->user_id)) {
            $feeds = Feed::with('user')
                ->where('user_id', $request->user_id)
                ->where('_id','!==',$authFeed->id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $feeds = Feed::with('user')
                ->where('_id','!==',$authFeed->id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }


        // Convert paginated feeds to array and insert $authFeed at the beginning (if not null)
        $feedItems = $feeds->items();

        if ($authFeed && $feeds->currentPage() == 1) {
            $alreadyExists = collect($feedItems)->pluck('_id')->contains($authFeed->_id);
            if (!$alreadyExists) {
                array_unshift($feedItems, $authFeed);
            }
        }

        $data = [
            'feeds' => $feedItems,
            // 'auth_feed' => $authFeed,
            'pagination' => [
                'page' => $feeds->currentPage(),
                'count' => $feeds->perPage(),
                'totalItems' => $feeds->total(),
                'totalPages' => $feeds->lastPage(),
            ]
        ];

        return ResponseHelper::sendResponse($data, 'Feeds fetch successfully');
    }


    public function public_index(Request $request)
    {
        if (!empty($request->user_id)) {
            $feeds = Feed::with('user')->where('user_id', $request->user_id)->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $feeds = Feed::with('user')->orderBy('created_at', 'desc')->paginate(5);
        }
        $data = [
            'feeds' => $feeds->items(),
            'pagination' => [
                'page' => $feeds->currentPage(),
                'count' => $feeds->perPage(),
                'totalItems' => $feeds->total(),
                'totalPages' => $feeds->lastPage(),
            ]
        ];

        return ResponseHelper::sendResponse($data, 'Feeds fetch successfully');
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return response()->json(['news' => $news, 'success' => true], 200);
    }

    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->json(['events' => $events, 'success' => true], 200);
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
            return response()->json(['message' => 'News Feed has been created Successfully', 'news' => $news, 'success' => true], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!', 'success' => false], 403);
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
            return response()->json(['message' => 'Event has been created Successfully', 'event' => $event, 'success' => true], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!', 'success' => false], 403);
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_type' => 'required',
            'feed_type' => 'required',
        ]);
        $feeds = new Feed();
        // dd($request->all());
        if ($request->feed_type == 'text') {
            $feeds->background_image = $request->background_image;
            $feeds->text_color = $request->text_color;
        }

        $feeds->grid_style = $request->grid_style;
        // $feeds->image_type = count($request->file('images') ?? []) + count($request->file('videos') ?? []);
        $feeds->description = $request->description;
        $feeds->text = $request->text;
        $feeds->text_properties = $request->text_properties;
        $feeds->user_type = $request->user_type;
        $feeds->feed_type = $request->feed_type;
        $feeds->user_id = auth()->user()->id;
        $images = [];
        $videos = [];

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uniqueName = uniqid() . '___' . str_replace(' ', '_', $image->getClientOriginalName());
                $images[] = [
                    'path' => $image->storeAs("images/user_feeds", $uniqueName, "public"),
                    'name' => $image->getClientOriginalName(),
                    'size' => $image->getSize(),
                ];
            }
            $feeds->images = $images; // Store as an array of objects in MongoDB
        }

        // Handle multiple video uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $uniqueName = uniqid() . '___' . str_replace(' ', '_', $video->getClientOriginalName());
                $videos[] = [
                    'path' => $video->storeAs("videos/user_feeds", $uniqueName, "public"),
                    'name' => $video->getClientOriginalName(),
                    'size' => $video->getSize(),
                    // 'length' => $this->getMediaDuration($video), // Optional
                ];
            }
            $feeds->videos = $videos; // Store as an array of objects in MongoDB
        }

        // Save the feed
        $feeds->save();
        $feed = Feed::with('user')->find($feeds->id);
        if ($feeds->save()) {
            return response()->json(['message' => 'Feed has been created Successfully', 'feed' => $feed, 'success' => true], 201);
        } else {
            return response()->json(['message' => 'Something went Wrong!', 'success' => false], 403);
        }
    }

    public function search_user(Request $request)
    {
        $users = User::whereHas('feeds')->with('country')
            ->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
            })
            ->get();
        return ResponseHelper::sendResponse($users, 'Users has been Fetched Successfully!');
    }

    public function change_permission(Request $request, $id)
    {
        $feed = Feed::find($id);
        $feed->user_type = $request->user_type;
        $feed->save();
        return ResponseHelper::sendResponse($feed, 'Feed has been Updated Successfully!');
    }

    public function delete($id)
    {
        $feed = Feed::find($id);
        if (!empty($feed->images)) {
            foreach ($feed->images as $image) {
                $file_path = public_path('storage/' . $image['path']);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        }

        if (!empty($feed->videos)) {
            foreach ($feed->videos as $video) {
                $file_path = public_path('storage/' . $video['path']);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        }
        $feed->delete();
        return ResponseHelper::sendResponse([], 'Feed has been Deleted Successfully!');
    }

    public function get_statistics($id)
    {
        $feed = Feed::with([
            'user',
            'views.user',
            'likes.user',
            'comments.user',
            'voice_comments.user',
            'shares.user'
        ])->find($id);

        if (!$feed) {
            return ResponseHelper::sendResponse([], 'Feed not found!', false, 404);
        }

        // Gender and Age Group Tracking
        $genderStats = ['male' => 0, 'female' => 0];

        $ageGroups = [
            '18-24' => ['male' => 0, 'female' => 0],
            '25-30' => ['male' => 0, 'female' => 0],
            '31-35' => ['male' => 0, 'female' => 0],
            '36-40' => ['male' => 0, 'female' => 0]
        ];

        $totalUsers = 0;
        $userIds = [];

        // Helper to process user
        $processUser = function ($user) use (&$genderStats, &$ageGroups, &$userIds, &$totalUsers) {
            if ($user && !in_array($user->_id, $userIds)) {
                $userIds[] = $user->_id;
                $totalUsers++;

                if ($user->gender === 'male') $genderStats['male']++;
                elseif ($user->gender === 'female') $genderStats['female']++;

                if (!empty($user->dob)) {
                    $age = Carbon::parse($user->dob)->age;
                    $gender = $user->gender;

                    if ($gender === 'male' || $gender === 'female') {
                        if ($age >= 18 && $age <= 24) $ageGroups['18-24'][$gender]++;
                        elseif ($age >= 25 && $age <= 30) $ageGroups['25-30'][$gender]++;
                        elseif ($age >= 31 && $age <= 35) $ageGroups['31-35'][$gender]++;
                        elseif ($age >= 36 && $age <= 40) $ageGroups['36-40'][$gender]++;
                    }
                }
            }
        };

        // Feed owner
        $processUser($feed->user);

        // Sections: likes, shares, views, etc.
        $sections = ['likes', 'shares', 'comments', 'voice_comments', 'views'];
        $sectionDetails = [];

        foreach ($sections as $section) {
            $items = $feed->$section;
            $sectionUserImages = [];

            foreach ($items as $item) {
                $user = $item->user ?? null;
                if ($user) {
                    $processUser($user);

                    if (!empty($user->image) && count($sectionUserImages) < 10) {
                        $sectionUserImages[] = [
                            'user_id' => $user->_id,
                            'name' => $user->name ?? '',
                            'image' => $user->image
                        ];
                    }
                }
            }

            $sectionDetails[$section] = [
                'count' => count($items),
                'users' => $sectionUserImages
            ];
        }

        // Format age group breakdown
        $formattedAgeGroups = [];
        foreach ($ageGroups as $range => $counts) {
            $formattedAgeGroups[] = [
                'age' => $range,
                'male' => $counts['male'],
                'female' => $counts['female']
            ];
        }

        // Final response
        return ResponseHelper::sendResponse([
            'gender_stats' => $genderStats,
            'age_group' => $formattedAgeGroups,
            'total_stats' => $sectionDetails
        ], 'Statistics has been Fetched Successfully!');
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

    public function getComments(Request $request, $id)
    {

        try {
            $feedType = $request->feed_type;
            $comments = FeedComments::with(['reports', 'child_comments' => function ($q) {
                $q->with(['reports', 'child_comments' => function ($q) {
                    $q->with(['reports', 'user' =>  function ($q) {
                        $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                    }])->with('likes')->with('liked')
                        // ->withCount('reports')
                    ;
                }, 'user' =>  function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->with('likes')->with('liked')
                    // ->withCount('reports')
                ;
            }, 'user' => function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])
                ->with('likes')->with('liked')
                ->where('feed_id', $id)->where('feed_type', $feedType)->where('parent_id', null)->get();

            $user = User::select('name', 'last_name', 'email', 'dob', 'image', 'username')->find(auth()->user()->id);

            if ($feedType == 'admin_feeds') {
                $feed = PopFeeds::with(['user' => function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->find($id);
            } elseif ($feedType == 'history') {
                $feed = History::with(['user' => function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->find($id);
            } else {
                $feed = Feed::with(['user' => function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->find($id);
            }

            $like = FeedLikes::where('user_id', $user->id)->where('feed_id', $id)->where('feed_type', $feedType)->first();

            if ($like) {
                $liked = true;
            } else {
                $liked = false;
            }

            $likeCount = FeedLikes::where('feed_id', $id)->where('feed_type', $feedType)->count();
            $commentCount = FeedComments::where('feed_id', $id)->where('feed_type', $feedType)->count();

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
            return ResponseHelper::sendResponse([], 'Failed to fetch Comment!', false, 403);
        }
    }

    public function storeComments(Request $request, $id)
    {
        $request->validate([
            'comment' => 'nullable|string',
            'feed_type' => 'required',
            //  'audio' => 'nullable|mimes:mp3,wav,aac|max:5120|file',
            'emoji' => 'nullable|string',
            //  'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // try {
        if ($request->file('image')) {
            $image = Helpers::fileUpload($request->image, 'feeds/image');
        } else {
            $image = null;
        }

        if ($request->file('audio')) {
            $audio = Helpers::fileUpload($request->audio, 'feeds/audio');
        } else {
            $audio = null;
        }

        if ($image == null && $audio == null && ($request->comment == "" || $request->comment == null) && ($request->emoji == "" || $request->emoji == null)) {
            return ResponseHelper::sendResponse([], 'Select Content Before Comment!', false, 403);
        }

        $comment = FeedComments::create([
            'user_id' => auth()->id(),
            'feed_id' => $id,
            'feed_type' => $request->feed_type,
            'comment' => $request->comment,
            'comment_type' => $request->comment_type ?? 'normal',
            'parent_id' => (empty($request->parent_id) || $request->parent_id === 'null') ? null : $request->parent_id,
            'audio' => $audio,
            'emoji' => $request->emoji,
            'image' =>  $image,
            'status' => 1
        ]);

        $comments = FeedComments::with(['child_comments' => function ($q) {
            $q->with(['child_comments' => function ($q) {
                $q->with(['user' =>  function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->with('likes')->with('liked');
            }, 'user' =>  function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])->with('likes')->with('liked');
        }, 'user' => function ($q) {
            $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
        }])
            ->with('likes')->with('liked')->where('feed_id', $id)->where('parent_id', null)
            ->where('feed_type', $request->feed_type)->get();

        $user = User::select('name', 'last_name', 'email', 'dob', 'image', 'username')->find(auth()->id());
        $commentCount = FeedComments::where('feed_id', $id)->where('feed_type', $request->feed_type)->count();
        $like = FeedLikes::where('user_id', $user->id)->where('feed_id', $id)->where('feed_type', $request->feed_type)->first();

        if ($like) {
            $liked = true;
        } else {
            $liked = false;
        }

        $likeCount = FeedLikes::where('feed_id', $id)->where('feed_type', $request->feed_type)->count();

        $data = [
            'comments' => $comments,
            'comments_count' => $commentCount,
            'liked' => $liked,
            'like_count' => $likeCount,
            'user' => $user
        ];

        return ResponseHelper::sendResponse($data, 'Comment has been successfully sent');
        // } catch (Exception $e) {
        //     return ResponseHelper::sendResponse([], 'Failed to send Comment!', false, 403);
        // }
    }

    public function editComments(Request $request, $id)
    {
        $request->validate([
            'comment' => 'nullable|string',
            // 'feed_type' => 'required',
            'emoji' => 'nullable|string',
        ]);

        // try {
        if ($request->file('image')) {
            $image = Helpers::fileUpload($request->image, 'feeds/image');
        } else {
            $image = null;
        }

        if ($request->file('audio')) {
            $audio = Helpers::fileUpload($request->audio, 'feeds/audio');
        } else {
            $audio = null;
        }

        if ($image == null && $audio == null && ($request->comment == "" || $request->comment == null) && ($request->emoji == "" || $request->emoji == null)) {
            return ResponseHelper::sendResponse([], 'Select Content Before Comment!', false, 403);
        }

        $comment = FeedComments::find($id);

        $comment->comment = $request->comment;
        if ($request->file('audio')) {
            $comment->audio = $audio;
        }
        if ($request->emoji) {
            $comment->emoji = $request->emoji;
        }
        if ($request->file('image')) {
            $comment->image =  $image;
        }
        $comment->save();

        $comments = FeedComments::with(['child_comments' => function ($q) {
            $q->with(['child_comments' => function ($q) {
                $q->with(['user' =>  function ($q) {
                    $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
                }])->with('likes')->with('liked');
            }, 'user' =>  function ($q) {
                $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
            }])->with('likes')->with('liked');
        }, 'user' => function ($q) {
            $q->select(['name', 'last_name', 'email', 'dob', 'image', 'username']);
        }])->with('likes')->with('liked')
            ->where('feed_id', $comment->feed_id)->where('parent_id', null)->where('feed_type', $comment->feed_type)->get();

        $user = User::select('name', 'last_name', 'email', 'dob', 'image', 'username')->find(auth()->id());
        $commentCount = FeedComments::where('feed_id', $id)->where('feed_type', $comment->feed_type)->count();
        $like = FeedLikes::where('user_id', $user->id)->where('feed_id', $comment->feed_id)->where('feed_type', $comment->feed_type)->first();

        if ($like) {
            $liked = true;
        } else {
            $liked = false;
        }

        $likeCount = FeedLikes::where('feed_id', $comment->feed_id)->where('feed_type', $comment->feed_type)->count();

        $data = [
            'comments' => $comments,
            'comments_count' => $commentCount,
            'liked' => $liked,
            'like_count' => $likeCount,
            'user' => $user
        ];

        return ResponseHelper::sendResponse($data, 'Comment has been successfully sent');
        // } catch (Exception $e) {
        //     return ResponseHelper::sendResponse([], 'Failed to send Comment!', false, 403);
        // }
    }

    public function commentLike(Request $request, $id)
    {
        $request->validate([
            'emoji' => 'nullable|string',
        ]);

        $user = Auth::user();

        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not authenticated!', false, 403);
        }

        $like = CommentsLike::where('user_id', $user->id)->where('comment_id', $id)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            CommentsLike::create([
                'user_id' => $user->id,
                'comment_id' => $id,
                'emoji' => $request->emoji
            ]);
            $liked = true;
        }

        $likeCount = CommentsLike::where('comment_id', $id)->count();

        $data = [
            'liked' => $liked,
            'like_count' => $likeCount
        ];
        return ResponseHelper::sendResponse($data, 'Like has been successfully Saved');
    }

    public function commentDelete($id)
    {
        try {
            $comment = FeedComments::find($id);
            $childs = FeedComments::where('parent_id', $id)->get();
            if ($childs) {
                foreach ($childs as $child) {
                    if ($child->audio) {
                        $file_path = public_path('storage/' . $child->audio);
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }

                    if ($child->image) {
                        $file_path = public_path('storage/' . $child->image);
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                    $child->delete();
                }
            }

            if ($comment->audio) {
                $file_path = public_path('storage/' . $comment->audio);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            if ($comment->image) {
                $file_path = public_path('storage/' . $comment->image);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $comment->delete();

            return ResponseHelper::sendResponse([], 'Comment has been Deleted!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Failed to Delete Comment', false, 403);
        }
    }

    public function feedLike(Request $request, $id)
    {
        $request->validate([
            'feed_type' => 'required',
        ]);

        $user = Auth::user();
        $postId = $id;

        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not authenticated!', false, 403);
        }

        $like = FeedLikes::where('user_id', $user->id)->where('feed_id', $postId)->where('feed_type', $request->feed_type)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            FeedLikes::create([
                'user_id' => $user->id,
                'feed_id' => $postId,
                'feed_type' => $request->feed_type,
            ]);
            $liked = true;
        }

        $likeCount = FeedLikes::where('feed_id', $postId)->where('feed_type', $request->feed_type)->count();

        $data = [
            'liked' => $liked,
            'like_count' => $likeCount
        ];
        return ResponseHelper::sendResponse($data, 'Like has been successfully Saved');
    }
}
