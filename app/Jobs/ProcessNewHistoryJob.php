<?php

namespace App\Jobs;

use App\Helpers\Helpers;
use App\Helpers\NotificationHelper;
use App\Models\AdminNotification;
use App\Models\History;
use App\Models\NotificationCenter;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class ProcessNewHistoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $historyId;

    // public $tries = 3;
    // public $timeout = 180;

    public function __construct($historyId)
    {
        $this->historyId = $historyId;
    }

    public function handle()
    {
        $history = History::find($this->historyId);
        \Log::info('History found?', [
            'exists' => $history ? true : false
        ]);

        if (!$history) {
            return;
        }

        /**
         * 1️⃣ Save Media Records
         */
        if (!empty($history->video)) {
            foreach ($history->video as $video) {
\Log::info('Video found', [
            'exists' => $video
        ]);
                Helpers::userMedia(
                    $history->_id,
                    $video['path'],
                    $history->comments_count,
                    $history->voice_comments_count,
                    $history->likes_count,
                    $history->views_count,
                    $history->user_id,
                    $history->description,
                    null,
                    'history'
                );
            }
        }

        /**
         * 2️⃣ Send Notifications
         */
        $notification = Notifications::first();
        $notify = AdminNotification::first();

        if (!$notification || !$notify) {
            return;
        }

        if (
            $notification->new_history != 'true'
            || $history->status != '1'
            || $notify->history != 1
        ) {
            return;
        }

        $description = str_replace(
            ["[name]"],
            [$history->title],
            $notification->new_history_description
        );

        /**
         * Cache Users For 60 Seconds
         * Reduces MongoDB Load
         */
        $users = Cache::remember('new_history_notify_users', 60, function () {
            return User::whereNotNull('fcm_token')
                ->where('new_history', 'true')
                ->whereIn('info_banner', ['banner', 'alert'])
                ->get();
        });

        foreach ($users as $user) {

            // Push Notification
            NotificationHelper::sendNotification(
                $user->id,
                $notification->new_history_title,
                $description
            );

            // Store Notification Center Record
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
}
