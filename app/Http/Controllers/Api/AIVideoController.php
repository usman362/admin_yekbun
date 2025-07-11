<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\AIVideo;

class AIVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allowRequest = PermissionHelper::checkPermission(Auth::user()->level, 'history_allow_history');
        // if ($allowRequest !== true) {
        //     return ResponseHelper::sendResponse([], 'You are not Allowed to See History.', false, 409);
        // }
        $ai_videos = AIVideo::orderBy('created_by', 'desc')->get();
        return ResponseHelper::sendResponse($ai_videos, 'AI Videos has been Fetch Successfully!');
    }
}
