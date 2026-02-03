<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\FeedComments;
use App\Models\NotificationCenter;
use App\Models\Notifications;
use App\Models\User;
use App\Services\BunnyCDNService;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KurdistanController extends Controller
{
   public function officials()
   {
        return view('content.officials.index');
   }
}
