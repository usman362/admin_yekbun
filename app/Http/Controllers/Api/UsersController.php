<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFriends;
use App\Models\UserRequest;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users_list(Request $request)
    {
        $users = User::select('id', 'user_id', 'username', 'image')->where('is_admin_user', 0)->get();
        return ResponseHelper::sendResponse($users, 'User Fetch Successfully');
    }

    public function users_details(Request $request, $id)
    {
        $user = User::select('id', 'user_id', 'user_type', 'name', 'last_name', 'username', 'image', 'dob', 'gender', 'origin', 'province', 'city')
            ->with(['user_feeds', 'friends', 'user_requests'])->find($id);
        return ResponseHelper::sendResponse($user, 'User Details Fetch Successfully');
    }

    public function sendRequest(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'status' => 'required'
        ]);
        $status = (int)$request->status;
        // try {
            $user_request = UserRequest::updateOrCreate(
                ['request_id' => $request->user_id, 'user_id' => auth()->user()->id],
                ['request_id' => $request->user_id, 'user_id' => auth()->user()->id, 'status' => $status]
            );
            return ResponseHelper::sendResponse($user_request, 'User Request Send Successfully');
        // } catch (Exception $e) {
        //     return ResponseHelper::sendResponse(null, 'Error to Send Request', false, 403);
        // }
    }

    public function acceptRequest(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'user_type' => 'required'
        ]);
        try {
            $user_request = UserFriends::updateOrCreate(
                ['friend_id' => $request->user_id, 'user_id' => auth()->user()->id],
                ['friend_id' => $request->user_id, 'user_id' => auth()->user()->id, 'user_type' => $request->user_type]
            );
            $oldRequests = UserRequest::where('request_id', $request->user_id)->where('user_id', auth()->user()->id)->get();
            if ($oldRequests) {
                foreach ($oldRequests as $request) {
                    $request->delete();
                }
            }
            return ResponseHelper::sendResponse($user_request, 'Request Accept Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Accept Request', false, 403);
        }
    }

    public function freind_list(Request $request, $id)
    {
        try {
            $user = User::select('id')->with(['friends' => function ($q) {
                $q->with('user');
            }])->find($id);
            $friends_list = $user->friends;
            return ResponseHelper::sendResponse($friends_list, 'Friends List Fetch Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Fetch Friends List', false, 403);
        }
    }

    public function request_list(Request $request, $id)
    {
        try {
            $user = User::select('id')->with(['user_requests' => function ($q) {
                $q->with('user');
            }])->find($id);
            $friends_list = $user->user_requests;
            return ResponseHelper::sendResponse($friends_list, 'Requests List Fetch Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Fetch Requests List', false, 403);
        }
    }
}
