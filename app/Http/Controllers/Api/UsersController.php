<?php

namespace App\Http\Controllers\Api;

use App\Helpers\NotificationHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFriends;
use App\Models\UserRequest;
use App\Models\UserVisitor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Google\Client as GoogleClient;

class UsersController extends Controller
{
    public function users_list(Request $request)
    {
        $users = User::select('id', 'user_id', 'username', 'image', 'is_online')->where('_id', '!=', auth()->user()->id)->where('is_admin_user', 0)->get();
        return ResponseHelper::sendResponse($users, 'User Fetch Successfully');
    }

    public function users_details(Request $request, $id)
    {
        $user = User::select('id', 'user_id', 'user_type', 'name', 'last_name', 'username', 'image', 'dob', 'gender', 'origin', 'province', 'city', 'is_online')
            ->with(['user_feeds', 'friends', 'user_requests'])->find($id);

        $friend = UserFriends::where('friend_id', $user->id)->where('user_id', auth()->user()->id)->first();
        if ($friend) {
            $is_friend = 1;
        } else {
            $is_friend = 0;
        }
        $data = ['user' => $user, 'is_friend' => $is_friend];
        return ResponseHelper::sendResponse($data, 'User Details Fetch Successfully');
    }

    public function sendRequest(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $status = (int) $request->status;

        try {
            $user_request = UserRequest::updateOrCreate(
                ['request_id' => $request->user_id, 'user_id' => auth()->user()->id],
                ['request_id' => $request->user_id, 'user_id' => auth()->user()->id, 'status' => $status]
            );
            $user = User::select('name', 'last_name', 'username', 'image', 'is_online')->find($request->user_id);
            NotificationHelper::sendNotification($request->user_id, 'Request Notification', $user);
            return ResponseHelper::sendResponse($user_request, 'User Request Send Successfully');
        } catch (Exception $e) {
            // Log error with file name, line number, and full message
            Log::error('UserRequest Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'user_id' => auth()->id(),
                'request_data' => $request->all()
            ]);

            return ResponseHelper::sendResponse(null, 'Error to Send Request', false, 403);
        }
    }

    public function acceptRequest(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'user_type' => 'required'
        ]);
        try {
            if ($request->user_type !== 'rejected') {
                $user_request = UserFriends::updateOrCreate(
                    ['friend_id' => $request->user_id, 'user_id' => auth()->user()->id],
                    ['friend_id' => $request->user_id, 'user_id' => auth()->user()->id, 'user_type' => $request->user_type]
                );

                $user_request_to = UserFriends::updateOrCreate(
                    ['user_id' => $request->user_id, 'friend_id' => auth()->user()->id],
                    ['user_id' => $request->user_id, 'friend_id' => auth()->user()->id, 'user_type' => $request->user_type]
                );
                $oldRequests = UserRequest::where('request_id', auth()->user()->id)->where('user_id', $request->user_id)->get();
                if ($oldRequests) {
                    foreach ($oldRequests as $request) {
                        $request->delete();
                    }
                }
                return ResponseHelper::sendResponse($user_request, 'Request Accept Successfully');
            } else {
                $oldRequests = UserRequest::where('request_id', auth()->user()->id)->where('user_id', $request->user_id)->get();
                if ($oldRequests) {
                    foreach ($oldRequests as $request) {
                        $request->delete();
                    }
                }
                return ResponseHelper::sendResponse(null, 'Request Rejected Successfully');
            }
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Accept Request', false, 403);
        }
    }

    public function unfriend_user(Request $request, $id)
    {
        try {
            $friend = UserFriends::where('user_id', $id)->where('friend_id', auth()->user()->id)->first();
            $friend_to = UserFriends::where('friend_id', $id)->where('user_id', auth()->user()->id)->first();
            $friend->delete();
            $friend_to->delete();
            return ResponseHelper::sendResponse(null, 'Unfriend has been Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Unfriend!', false, 403);
        }
    }

    public function freind_list(Request $request, $id)
    {
        try {
            // if ($request->user_type == 'family') {
            $user = User::select('_id')->with(['family' => function ($q) {
                $q->with('user');
            }])->find($id);
            $family_list = $user->family ?? [];
            // return ResponseHelper::sendResponse($family_list, 'Family List Fetch Successfully');
            // } else {
            $user = User::select('_id')->with(['friends' => function ($q) {
                $q->with('user');
            }])->find($id);
            $friends_list = $user->friends ?? [];
            return ResponseHelper::sendResponse(['friends_list' => $friends_list, 'family_list' => $family_list], 'Friends List Fetch Successfully');
            // }
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Fetch Friends List', false, 403);
        }
    }

    public function update_freind_list(Request $request)
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

            $user_request_to = UserFriends::updateOrCreate(
                ['user_id' => $request->user_id, 'friend_id' => auth()->user()->id],
                ['user_id' => $request->user_id, 'friend_id' => auth()->user()->id, 'user_type' => $request->user_type]
            );

            return ResponseHelper::sendResponse($user_request, 'Friends/Family Updated Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Fail to Update Friends/Family!', false, 403);
        }
    }

    public function family_list(Request $request, $id)
    {
        try {
            $user = User::select('_id')->with(['family' => function ($q) {
                $q->with('user');
            }])->find($id);
            $family_list = $user->family;
            return ResponseHelper::sendResponse($family_list, 'Family List Fetch Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Fetch Family List', false, 403);
        }
    }

    public function request_list(Request $request, $id)
    {
        try {
            $user = User::select('id', 'name')->with(['user_requests' => function ($q) {
                $q->with('user');
            }])->find($id);
            $friends_list = $user->user_requests;
            return ResponseHelper::sendResponse($friends_list, 'Requests List Fetch Successfully');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Error to Fetch Requests List', false, 403);
        }
    }

    public function store_user_online(Request $request, $id)
    {
        $request->validate([
            'value' => 'required'
        ]);

        $user = User::find($id);
        if ($user) {
            $user->is_online = (int)$request->value;
            $user->save();
            (int)$request->value == 1 ? $status = 'Online' : $status = 'Offline';
            return ResponseHelper::sendResponse($user, 'User ' . $status . ' Successfully!');
        } else {
            return ResponseHelper::sendResponse(null, 'User Not Found!', false, 403);
        }
    }

    public function vistor(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        try {
            $visitor = UserVisitor::updateOrCreate(
                ['user_id' => $request->user_id, 'visitor_id' => auth()->user()->id],
                ['user_id' => $request->user_id, 'visitor_id' => auth()->user()->id]
            );
            $totalVisitors = UserVisitor::where('user_id', $request->user_id)->count();
            $user = User::find($request->user_id);
            $user->total_views = $totalVisitors;
            $user->save();
            return ResponseHelper::sendResponse($visitor, 'User Visit has been Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Visit User!', false, 403);
        }
    }

    public function get_vistor($id)
    {

        try {
            $visitors = UserVisitor::with(['user', 'visitor'])->where('user_id', $id)->get();
            $totalVisitors = UserVisitor::where('user_id', $id)->count();
            $data = ['visitors' => $visitors, 'total_views' => $totalVisitors];
            return ResponseHelper::sendResponse($data, 'User Visit has been Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Visit User!', false, 403);
        }
    }

    public function updateDeviceToken(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,_id',
            'fcm_token' => 'required|string',
        ]);

        $request->user()->update(['fcm_token' => $request->fcm_token]);

        return response()->json(['message' => 'Device token updated successfully']);
    }


    public function sendNotification(Request $request)

    {
        $request->validate([
            'user_id' => 'required|exists:users,_id',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $user = \App\Models\User::find($request->user_id);
        $fcm = $user->fcm_token;

        if (!$fcm) {
            return response()->json(['message' => 'User does not have a device token'], 400);
        }

        $title = $request->title;
        $description = $request->body;
        $projectId = env('FCM_PROJECT_ID'); # INSERT COPIED PROJECT ID

        $credentialsFilePath = Storage::path('json/services.json');
        $client = new GoogleClient();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();

        $access_token = $token['access_token'];

        $headers = [
            "Authorization: Bearer $access_token",
            'Content-Type: application/json'
        ];

        $data = [
            "message" => [
                "token" => $fcm,
                "notification" => [
                    "title" => $title,
                    "body" => $description,
                ],
            ]
        ];
        $payload = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return response()->json([
                'message' => 'Curl Error: ' . $err
            ], 500);
        } else {
            return response()->json([
                'message' => 'Notification has been sent',
                'response' => json_decode($response, true)
            ]);
        }
    }
}
