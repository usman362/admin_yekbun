<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Http\Request;

class UserViewAccount extends Controller
{
  public function index($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-account',compact('user'));
  }
  public function friends($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-friends',compact('user'));
  }
  public function family($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-family',compact('user'));
  }
  public function feeds($id)
  {
    $user = User::find($id);
    $feeds = Feed::where('user_id',$id)->get();
    return view('content.apps.app-user-view-feeds',compact('user','feeds'));
  }
  public function playlist($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-playlist',compact('user'));
  }
  public function videos($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-videos',compact('user'));
  }
  public function activity($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-activity',compact('user'));
  }
  public function location($id)
  {
    $user = User::find($id);
    return view('content.apps.app-user-view-location',compact('user'));
  }
}
