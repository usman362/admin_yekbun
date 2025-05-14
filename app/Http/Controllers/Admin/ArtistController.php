<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\City;
use App\Models\Artist;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\MusicCategory;
use App\Models\Notifications;
use App\Models\Song;
use App\Models\User;
use App\Models\VideoClip;
use Yajra\DataTables\DataTables;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax() && $request->table == 'dataTable') {

            if($request->has('sort_by')){
                if($request->sort_by == 'songs'){
                    $artists = Artist::with('songs')->get()->sortByDesc(function ($artist) {
                        return $artist->songs->count();
                    });
                }else{
                    $artists = Artist::with('videos')->get()->sortByDesc(function ($artist) {
                        return $artist->videos->count();
                    });
                }
            }else{
                $artists = Artist::with(['songs','videos'])->get()->orderByDesc('created_at');
            }

            return DataTables::of($artists)
                ->addIndexColumn() // Adds the index column (auto-increment)
                ->addColumn('artist_info', function ($artist) {
                    $image = $artist->image ? asset('storage/' . $artist->image) : 'https://www.w3schools.com/w3images/avatar2.png';
                    $info = '<div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <img src="' . $image . '" alt="' . e($artist->name) . '" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">' . e($artist->name) . '</span>
                                </a>
                                <small class="fw-semibold">'. ($artist->province->name ?? 'N/A') . '</small>
                            </div>
                        </div>';
                    return $info;
                })
                ->addColumn('total_songs', function ($artist) {
                    return '<a href="javascript:void(0)" class="text-black artistDetail" data-id="' . $artist->id . '" data-section="songs" data-bs-toggle="modal"
                                data-image="' . asset('storage/' . $artist->image) . '" data-name="' . $artist->name . '"
                                data-gender="' . $artist->gender . '"
                                data-province="' . ($artist->province->name ?? 'N/A') . '"
                                data-bs-target="#artistDetailModal">' . $artist->songs->count() . '</a>';
                })
                ->addColumn('total_videos', function ($artist) {
                    return '<a href="javascript:void(0)" class="text-black artistDetail" data-id="' . $artist->id . '" data-section="videos" data-bs-toggle="modal"
                                data-name="' . $artist->name . '" data-image="' . asset('storage/' . $artist->image) . '"
                                data-gender="' . $artist->gender . '"
                                data-province="' . ($artist->province->name ?? 'N/A') . '"
                                data-bs-target="#artistDetailModal">' . $artist->videos->count() . '</a>';
                })
                ->addColumn('like', function () {
                    return '0';
                })
                ->addColumn('actions', function ($artist) {
                    $provinces = Region::get();
                    $actions = view('content.artist.actions', compact('artist', 'provinces'));
                    return $actions;
                })
                ->rawColumns(['image', 'artist_info', 'total_songs', 'total_videos', 'actions'])
                ->make(true);
        }

        // Non-AJAX request (for initial page load)
        $artists = Artist::with('songs', 'videos')->get();
        $provinces = Region::get();
        $categories = MusicCategory::doesntHave('musics')->get();
        return view('content.artist.index', compact('provinces', 'categories', 'artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'last_name' => 'required',
            // 'city' => 'required',
            'gender' => 'required',
            'image' => 'required'
        ]);

        $artist = new Artist();
        $artist->name = $request->name;
        // $artist->last_name = $request->last_name;
        $artist->gender = $request->gender;
        $artist->status = $request->status;
        // $artist->city_id = $request->city;
        $artist->province_id = $request->province;
        $artist->image = $request->image ?? '';
        if ($artist->save()) {
            $notification = Notifications::first();
            if($notification->new_artist == 'true'){
                try {
                    $users = User::whereNotNull('fcm_token')->where('new_music','true')->whereIn('info_banner',['banner','alert'])->get();
                    if ($users) {
                        foreach ($users as $user) {
                            NotificationHelper::sendNotification($user->id, 'Artist Notification', 'New Artist ' . $artist->name . ' has been added!');
                        }
                    }
                } catch (\Exception $e) {
                    return back()->with("success", "Artist has been added successfully.");
                }
            }

            // return redirect()->route('artist.index')->with('success', 'Artist Has been inserted');
            return back()->with("success", "Artist has been added successfully.");
        } else {
            // return redirect()->route('artist.index')->with('error', 'Failed to add artist');
            return back()->with('error', 'Failed to add artist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::findorFail($id);
        return view('content.artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::findorFail($id);
        $artist->name = $request->name;
        // $artist->last_name = $request->last_name;
        $artist->dob = $request->dob;
        $artist->gender = $request->gender;
        $artist->image = $request->image ?? '';
        $artist->status = $request->status;
        // $artist->city_id = $request->city;
        $artist->province_id = $request->province;

        // if($request->hasFile('image')){
        //    if(isset($artist->image)){
        //        $image_path  = public_path('storage/'.$artist->image);
        //        if(file_exists($image_path)){
        //            unlink($image_path);
        //        }
        //        $path = $request->file('image')->store('/images/artist' , 'public');
        //        $artist->image = $path;
        //    }
        // }

        if ($artist->update()) {
            return redirect()->route('artist.index')->with('success', 'Artist Has been Updated');
        } else {
            return redirect()->route('artist.index')->with('success', 'Artist not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findorFail($id);
        if ($artist->image) {
            $image_path = public_path('storage/' . $artist->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        if ($artist->delete($artist->id)) {
            return redirect()->route('artist.index')->with('success', 'Artist  has been deleted successfully.');
        } else {
            return redirect()->route('artist.index')->with('error', 'Failed to delete artist.');
        }
    }

    public function status($id, $status)
    {
        $artist = Artist::find($id);
        $artist->status = $status;
        if ($artist->update()) {
            return redirect()->route('artist.index')->with('success', 'Status Has been Updated');
        } else {
            return redirect()->route('artist.index')->with('error', 'Status is not changed');
        }
    }

    public function get_city($id)
    {
        $province = Region::findorFail($id);
        return $city = City::where('region_id', $province->id)->get();
    }

    public function deleteArtistImage($id)
    {
        $music = Artist::find($id);
        if ($music && isset($music->image)) {
            $path = public_path('storage/' . $music->image);
            if (file_exists($path)) {
                unlink($path);
            }

            // Remove the image filename from the model attribute
            $music->image = null;
            $music->save();
        }

        return [
            'status' => true
        ];
    }

    public function getArtistDetail(Request $request)
    {
        $artist = Artist::find($request->id);
        $songs = Song::where('artist_id', $artist->id)->get();
        $clips = VideoClip::where('artist_id', $artist->id)->get();
        return response()->json(['songs' => $songs, 'clips' => $clips], 200);
    }
}
