<?php

namespace App\Http\Controllers\Api;

use App\Helpers\NotificationHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\FeedComments;
use App\Models\NotificationCenter;
use App\Models\ReportComments;
use App\Models\ReportFeeds;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ReportCommentsController extends Controller
{
    public function index(Request $request, $id)
    {
        $reports = ReportComments::where('comment_id', $id)->get();
        return ResponseHelper::sendResponse($reports, 'Report Comments');
    }
    public function getUserReportedComments()
    {
        $userId = Auth::id();
        // Comments that belong to this user and have been reported
        $reportComments = ReportComments::with(['comment.feed', 'user'])
            ->whereHas('comment', function ($q) use ($userId) {
                $q->where('user_id', $userId); // Comment belongs to the user
            })
            ->get()
            ->map(fn($item) => [
                'type' => 'comment',
                'data' => $item,
                'created_at' => $item->created_at,
            ]);

        // Feeds that belong to this user and have been reported
        $reportFeeds = ReportFeeds::with(['feed', 'user'])
            ->whereHas('feed', function ($q) use ($userId) {
                $q->where('user_id', $userId); // Feed belongs to the user
            })
            ->get()
            ->map(fn($item) => [
                'type' => 'feed',
                'data' => $item,
                'created_at' => $item->created_at,
            ]);

        // Merge both
        $mergedReports = collect()
            ->merge($reportComments)
            ->merge($reportFeeds)
            ->sortByDesc('created_at')
            ->values();

        return ResponseHelper::sendResponse([
            'reported_items' => $mergedReports,
        ], 'Reported items fetched successfully');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'report_type' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $exists = ReportComments::where('user_id', $userId)
            ->where('comment_id', $id)
            ->exists();

        if ($exists) {
            return ResponseHelper::sendResponse([], 'You have already reported this comment.', false, 400);
        }

        $report = ReportComments::create([
            'comment_id' => $id,
            'report_type' => Str::slug($request->report_type),
            'user_id' => $userId,
        ]);

        // Notify the comment owner
        $comment = FeedComments::find($id);
        if ($comment) {
            $owner = User::where('_id', $comment->user_id)
                ->whereIn('info_banner', ['banner', 'alert'])
                ->first();

            if ($owner) {
                NotificationHelper::sendNotification(
                    $owner->_id,
                    'Feed Comment Reported',
                    "Your comment has been reported"
                );

                NotificationCenter::create([
                    'title' => 'Feed Comment Reported',
                    'description' => "Your comment has been reported",
                    'user_id' => $owner->_id,
                    'user_image' => $owner->image ?? null,
                    'type' => 'feed_comments',
                    'is_read' => 0,
                ]);
            }
        }

        return ResponseHelper::sendResponse($report, 'Comment reported successfully');
    }

    public function reportfeedstore(Request $request, $id)
    {
        $request->validate([
            'report_type' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $exists = ReportFeeds::where('feed_id', $id)
            ->where('user_id', $userId)
            ->exists();

        if ($exists) {
            return ResponseHelper::sendResponse([], 'You have already reported this feed.', false, 400);
        }

        $report = ReportFeeds::create([
            'feed_id' => $id,
            'report_type' => Str::slug($request->report_type),
            'user_id' => $userId,
        ]);

        // Notify the feed owner
        $feed = Feed::find($id);
        if ($feed) {
            $owner = User::where('_id', $feed->user_id)
                ->whereIn('info_banner', ['banner', 'alert'])
                ->first();

            if ($owner) {
                NotificationHelper::sendNotification(
                    $owner->_id,
                    'Feed Reported',
                    "Your feed has been reported"
                );

                NotificationCenter::create([
                    'title' => 'Feed Reported',
                    'description' => "Your feed has been reported",
                    'user_id' => $owner->_id,
                    'user_image' => $owner->image ?? null,
                    'type' => 'feeds',
                    'is_read' => 0,
                ]);
            }
        }

        return ResponseHelper::sendResponse($report, 'Feed reported successfully');
    }
}
