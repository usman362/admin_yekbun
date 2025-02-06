<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Feed;
use App\Models\News;
use App\Models\PopFeeds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class AdminProfileController extends Controller
{
    public function index()
    {
        $activity = Auth::user()->actions()->orderBy('created_at', 'DESC')->paginate(20);
        // return view('content.admin_profile.index', compact("activity"));
        return view('content.pages.pages-account-settings-account', compact('activity'));
    }

    public function welcome(){
        return view('content.welcome');
    }

    public function admin_activity()
    {
        $popfeeds = PopFeeds::orderBy('created_at','desc')->get();
        return view('content.pages.admin_activity',compact('popfeeds'));
    }

    public function store(Request $request)
    {

        $profile = User::find(auth()->user()->id);
        if (!empty($request->name) && $request->name !== "") {
            $profile->name = $request->name;
        }
        if (!empty($request->last_name) && $request->last_name !== "") {
            $profile->last_name = $request->last_name;
        }
        if (!empty($request->email) && $request->email !== "") {
            $profile->email  = $request->email;
        }
        if (!empty($request->phone) && $request->phone !== "") {
            $profile->phone  = $request->phone;
        }
        if (!empty($request->password) && $request->password !== "") {
            $profile->password  = Hash::make($request->password);
        }
        // unlink($profile->image);
        if ($request->has('image')) {
            $image_path = Helpers::fileUpload($request->image, 'images/user');
            $profile->image = $image_path;
        }
        if ($profile->update()) {
            return back()->with('success', 'Your profile has been updated');
        } else {
            return back()->with('error', 'Failed to Update your profile');
        }
    }

    public function security()
    {
        return view('content.pages.pages-account-settings-security');
    }

    public function enable(Request $request)
    {

        if ($request->has('enable')) {
            auth()->user()->enable_2fa  = true;
            auth()->user()->save();
            return back()->with('success', 'Two Factor Authentication Enabled');
        } else {
            auth()->user()->enable_2fa  = false;
            auth()->user()->save();
            return back()->with('error', 'Two Factor Authentication Disabled');
        }
    }

    public function account()
    {
        $activity = Auth::user()->actions()->orderBy('created_at', 'DESC')->paginate(20);

        return view('content.pages.pages-account-settings-account', compact('activity'));
    }
    public function billing()
    {
        return view('content.pages.pages-account-settings-billing');
    }
    public function notification()
    {
        return view('content.pages.pages-account-settings-notifications');
    }
    public function connection()
    {
        return view('content.pages.pages-account-settings-connections');
    }



    public function change_password(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required'
        ]);
        if (!Hash::check($request->currentPassword, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        } else {
            if ($request->newPassword == $request->confirmPassword) {

                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->newPassword)
                ]);
                return back()->with("success", "Password changed successfully!");
            } else {
                return back()->with('error', 'Your New Password  and Confirm Password  is not matched');
            }
        }
    }


    public function store_pops(Request $request){

        $request->validate([
            'title' => 'required',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $poptyp = $request->type;
        $optons = "";

        if($poptyp == "System"){
            $optons = $request->option;
        }
        if($poptyp == "Donation"){
            $optons = $request->option_2;
        }
        if($poptyp == "Surveys"){
            $optons = $request->option_3;
        }
        if($poptyp == "Greetings"){
            $optons = $request->option_4;
        }


//die("154");


        if($request->upid > 0){

            $postpop = PopFeeds::where('_id', $request->upid)->first();

            if($postpop != null){


                if($request->type == "Donation"){

                    $postpop->limited = $request->limit;
                    $postpop->is_paypal = $request->is_paypal ?? 0;
                    $postpop->is_gpay = $request->is_gpay ?? 0;
                    $postpop->is_pay_office = $request->is_payoffice ?? 0;
                    $postpop->is_pay_other = $request->is_other ?? 0;
                    $postpop->title = $request->title;
                    $postpop->date_start = $request->start_date;
                    $postpop->date_ends = $request->end_date;
                    $postpop->share_option = $optons;
                    $postpop->is_comments = $request->comments ?? 0;
                    $postpop->is_share = $request->share ?? 0;
                    $postpop->is_emoji = $request->emoji ?? 0;

                    if ($request->hasFile('image')) {

                        $image = $request->file('image');
                        $imageName = time() . '-post.' . $image->getClientOriginalExtension();
                        $imagePath =  $image->storeAs("/images", $imageName, "public");
                        $postpop->image = $imagePath;
                    }

                    $postpop->update();
                }else{

                    $postpop->title = $request->title;
                    $postpop->date_start = $request->start_date;
                    $postpop->date_ends = $request->end_date;
                    $postpop->share_option = $optons;
                    $postpop->is_comments = $request->comments ?? 0;
                    $postpop->is_share = $request->share ?? 0;
                    $postpop->is_emoji = $request->emoji ?? 0;

                    $postpop->txt1 = $request->txt1;
                    $postpop->txt2 = $request->txt2;
                    $postpop->txt3 = $request->txt3;

                    if ($request->hasFile('image')) {

                        $image = $request->file('image');
                        $imageName = time() . '-post.' . $image->getClientOriginalExtension();
                        $imagePath =  $image->storeAs("/images", $imageName, "public");
                        $postpop->image = $imagePath;
                    }

                    if ($request->hasFile('icon1')) {
                        $image = $request->file('icon1');
                        $icon1 = time() . rand() . '-icon.' . $image->getClientOriginalExtension();
                        $icon1Path =  $image->storeAs("/images/icons", $icon1, "public");
                        $postpop->icon1 = $icon1Path;
                    }
                    if ($request->hasFile('icon2')) {
                        $image = $request->file('icon2');
                        $icon2 = time()  . rand() . '-icon.' . $image->getClientOriginalExtension();
                        $icon2Path =  $image->storeAs("/images/icons", $icon2, "public");
                        $postpop->icon2 = $icon2Path;
                    }
                    if ($request->hasFile('icon3')) {
                        $image = $request->file('icon3');
                        $icon3 = time()  . rand() . '-icon.' . $image->getClientOriginalExtension();
                        $icon3Path =  $image->storeAs("/images/icons", $icon3, "public");
                        $postpop->icon3 = $icon3Path;
                    }

                    $postpop->update();


                }
                return back()->with('success', 'Popup Feed updated successfully.');
            }


        }else{

            $imageName = "";
            $icon1 = "";
            $icon2 = "";
            $icon3 = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-post.' . $image->getClientOriginalExtension();
            $imagePath =  $image->storeAs("/images", $imageName, "public");
        }

        if ($request->hasFile('icon1')) {
            $image = $request->file('icon1');
            $icon1 = time() . rand() . '-icon.' . $image->getClientOriginalExtension();
            $image->move('public/images/icons/', $icon1);
            $icon1Path =  $image->storeAs("/images/icons", $icon1, "public");

        }
        if ($request->hasFile('icon2')) {
            $image = $request->file('icon2');
            $icon2 = time()  . rand() . '-icon.' . $image->getClientOriginalExtension();
            $image->move('public/images/icons/', $icon2);
            $icon2Path =  $image->storeAs("/images/icons", $icon2, "public");
        }
        if ($request->hasFile('icon3')) {
            $image = $request->file('icon3');
            $icon3 = time()  . rand() . '-icon.' . $image->getClientOriginalExtension();
            $image->move('public/images/icons/', $icon3);
            $icon3Path =  $image->storeAs("/images/icons", $icon3, "public");
        }

        if($request->type == "Donation"){

            $postpop = PopFeeds::create([
                'limited' => $request->limit,
                'is_paypal' => $request->is_paypal ?? 0,
                'is_gpay' => $request->is_gpay ?? 0,
                'is_pay_office' => $request->is_payoffice ?? 0,
                'is_pay_other' => $request->is_other ?? 0,
                'user_id' => 0,
                'title' => $request->title,
                'date_start' => $request->start_date,
                'date_ends' => $request->end_date,
                'image' => $imagePath ?? '',
                'share_option' => $optons,
                'status' => 1,
                'is_comments' => $request->comments ?? 0,
                'is_share' => $request->share ?? 0,
                'is_emoji' => "1",
                'type' => $request->type,
            ]);

        }else{
            $postpop = PopFeeds::create([
                'user_id' => 0,
                'title' => $request->title,
                'date_start' => $request->start_date,
                'date_ends' => $request->end_date,
                'image' => $imagePath ?? '',
                'share_option' => $optons,
                'status' => 1,
                'is_comments' => $request->comments ?? 0,
                'is_share' => $request->share ?? 0,
                'is_emoji' => "1",
                'type' => $request->type,
                'icon1' => $icon1Path ?? '',
                'icon2' => $icon2Path ?? '',
                'icon3' => $icon3Path ?? '',
                'txt1' => $request->txt1,
                'txt2' => $request->txt2,
                'txt3' => $request->txt3
            ]);
        }

        return back()->with('success', 'Popup Feed added successfully.');

        }



    }

    public function delete_pops(Request $request){
        $delid = $request->delid;
        $popfeed = PopFeeds::where('_id', $delid)->first();
        $popfeed->delete();
        return back()->with('success', 'Popup Feed deleted successfully.');
    }

    public function store_news(Request $request)
    {
        $news = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_type' => $request->user_type,
            'image' => $request->image,
            'image_type' => (int)$request->image_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'comments' => (int)$request->comments ?? 0,
            'voice_comments' => (int)$request->voice_comments ?? 0,
            'share' => (int)$request->share ?? 0,
            'emotion' => (int)$request->emotion ?? 0,
            'status' => $request->status,
        ]);
        return back();
    }

    public function store_event(Request $request)
    {
        // $request->dd();
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return back();
    }

    public function store_feeds(Request $request)
    {
        // $request->dd();
        $feeds = Feed::create([
            'feed_background_image' => $request->feed_background_image,
            'feed_text_color' => $request->feed_text_color,
            'grid_style' => $request->grid_style,
            'image_type' => (int)$request->image_type,
            'description' => $request->description,
            'user_type' => $request->user_type,
            'feed_type' => $request->feed_type,
            'image' => $request->image,
            'image_file_name' => $request->image_file_name,
            'image_file_length' => $request->image_file_length,
            'image_file_size' => $request->image_file_size,
            'video' => $request->video,
            'video_file_name' => $request->video_file_name,
            'video_file_length' => $request->video_file_length,
            'video_file_size' => $request->video_file_size,
        ]);
        return back();
    }

    public function get_popfeeds(Request $request)
    {
        $popfeeds = PopFeeds::orderBy('created_at', 'desc')->get();
        return response()->json(['popfeeds' => $popfeeds],200);
    }
}
