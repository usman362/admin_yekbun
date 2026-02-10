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
use App\Models\NotificationCenter;
use App\Models\Notifications;
use App\Models\Song;
use App\Models\User;
use App\Models\VideoClip;
use Illuminate\Support\Facades\Auth;
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
        if (!auth()->user()->can('music.published') && !auth()->user()->can('music.unpublished')) {
            return redirect('/');
        }
        if ($request->ajax() && $request->table == 'dataTable') {
            if (auth()->user()->can('music.published') && auth()->user()->can('music.unpublished')) {
                // Can view both
                if ($request->has('sort_by')) {
                    if ($request->sort_by == 'songs') {
                        $artists = Artist::with('songs')->get()->sortByDesc(function ($artist) {
                            return $artist->songs->count();
                        });
                    } else {
                        $artists = Artist::with('videos')->get()->sortByDesc(function ($artist) {
                            return $artist->videos->count();
                        });
                    }
                } else {
                    $artists = Artist::with(['songs', 'videos'])->get()->orderByDesc('created_at');
                }
            } elseif (auth()->user()->can('music.published')) {
                // Can view only published
                if ($request->has('sort_by')) {
                    if ($request->sort_by == 'songs') {
                        $artists = Artist::with('songs')->where('status', '1')->get()->sortByDesc(function ($artist) {
                            return $artist->songs->count();
                        });
                    } else {
                        $artists = Artist::with('videos')->where('status', '1')->get()->sortByDesc(function ($artist) {
                            return $artist->videos->count();
                        });
                    }
                } else {
                    $artists = Artist::with(['songs', 'videos'])->where('status', '1')->get()->orderByDesc('created_at');
                }
            } elseif (auth()->user()->can('music.unpublished')) {
                // Can view only unpublished
                if ($request->has('sort_by')) {
                    if ($request->sort_by == 'songs') {
                        $artists = Artist::with('songs')->where('status', '0')->get()->sortByDesc(function ($artist) {
                            return $artist->songs->count();
                        });
                    } else {
                        $artists = Artist::with('videos')->where('status', '0')->get()->sortByDesc(function ($artist) {
                            return $artist->videos->count();
                        });
                    }
                } else {
                    $artists = Artist::with(['songs', 'videos'])->where('status', '0')->get()->orderByDesc('created_at');
                }
            }

            return DataTables::of($artists)
                ->addIndexColumn()
                ->addColumn('artist_info', function ($artist) {
                    $imagePath = is_string($artist->image) && !empty($artist->image)
                        ? env('BUNNY_CDN_URL') . $artist->image
                        : 'https://www.w3schools.com/w3images/avatar2.png';

                    $info = '<div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <img src="' . $imagePath . '" alt="' . e($artist->name) . '" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">' . e($artist->name) . '</span>
                                </a>
                                <small class="fw-semibold">' . ($artist->province->name ?? 'N/A') . '</small>
                            </div>
                        </div>';
                    return $info;
                })
                ->addColumn('total_songs', function ($artist) {
                    $imagePath = is_string($artist->image) && !empty($artist->image)
                        ? env('BUNNY_CDN_URL') . $artist->image
                        : 'https://www.w3schools.com/w3images/avatar2.png';
                    return '<a href="javascript:void(0)" class="text-black artistDetail" data-id="' . $artist->id . '" data-section="songs" data-bs-toggle="modal"
                                data-image="' . $imagePath . '" data-name="' . $artist->name . '"
                                data-gender="' . $artist->gender . '"
                                data-province="' . ($artist->province->name ?? 'N/A') . '"
                                data-bs-target="#artistDetailModal">' . $artist->songs->count() . '</a>';
                })
                ->addColumn('total_videos', function ($artist) {
                    $imagePath = is_string($artist->image) && !empty($artist->image)
                        ? env('BUNNY_CDN_URL') . $artist->image
                        : 'https://www.w3schools.com/w3images/avatar2.png';
                    return '<a href="javascript:void(0)" class="text-black artistDetail" data-id="' . $artist->id . '" data-section="videos" data-bs-toggle="modal"
                                data-name="' . $artist->name . '" data-image="' . $imagePath . '"
                                data-gender="' . $artist->gender . '"
                                data-province="' . ($artist->province->name ?? 'N/A') . '"
                                data-bs-target="#artistDetailModal">' . $artist->videos->count() . '</a>';
                })
                ->addColumn('like', function () {
                    return '0';
                })
                ->addColumn('status', function ($row) {
                    $statusClass = $row->status == '1' ? 'bg-success' : 'bg-danger';
                    $statusText = $row->status == '1' ? 'Published' : 'UnPublished';

                    return '<span class="badge ' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('actions', function ($artist) {
                    $provinces = Region::get();
                    $imagePath = is_string($artist->image) && !empty($artist->image)
                        ? env('BUNNY_CDN_URL') . $artist->image
                        : 'https://www.w3schools.com/w3images/avatar2.png';
                    return view('content.artist.actions', compact('artist', 'provinces','imagePath'))->render();
                })

                ->rawColumns(['image', 'artist_info', 'total_songs', 'total_videos', 'status', 'actions'])
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
            $description = str_replace(
                ["[name]"],
                [$request->name],
                $notification->new_artist_description
            );
            if ($notification->new_artist == 'true' && $request->status == '1') {
                try {
                    $users = User::where('_id', '!==', Auth::id())->whereNotNull('fcm_token')->where('new_music', 'true')->whereIn('info_banner', ['banner', 'alert'])->get();
                    if ($users) {
                        foreach ($users as $user) {
                            NotificationHelper::sendNotification($user->id, $notification->new_artist_title, $description);
                            NotificationCenter::create([
                                'title' => $notification->new_artist_title,
                                'description' => $description,
                                'user_id' => $user->id,
                                'user_image' => $user->image ?? null,
                                'type' => 'artist',
                                'is_read' => 0,
                            ]);
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

        $artist = Artist::findOrFail($id);

        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->gender = $request->gender;
        $artist->status = $request->status;
        $artist->province_id = $request->province;

        // Check if new image is different from old one
        if ($request->image && $request->image !== $artist->image) {
            $artist->image = null;
            $artist->save();
            $oldImagePath = public_path($artist->image);

            // Unlink only if file exists and is local
            if ($artist->image && file_exists($oldImagePath)) {
                @unlink($oldImagePath); // Use @ to suppress errors in case of missing file
            }

            $artist->image = $request->image;
        }

        if ($artist->save()) {
            $notification = Notifications::first();
            $description = str_replace(
                ["[name]"],
                [$request->name],
                $notification->new_artist_description
            );
            if ($notification->new_artist == 'true' && $request->status == '1') {
                try {
                    $users = User::where('_id', '!==', Auth::id())->whereNotNull('fcm_token')->where('new_music', 'true')->whereIn('info_banner', ['banner', 'alert'])->get();
                    if ($users) {
                        foreach ($users as $user) {
                            NotificationHelper::sendNotification($user->id, $notification->new_artist_title, $description);
                            NotificationCenter::create([
                                'title' => $notification->new_artist_title,
                                'description' => $description,
                                'user_id' => $user->id,
                                'user_image' => $user->image ?? null,
                                'type' => 'artist',
                                'is_read' => 0,
                            ]);
                        }
                    }
                } catch (\Exception $e) {
                    return back()->with("success", "Artist has been updated successfully.");
                }
            }
            return redirect()->route('artist.index')->with('success', 'Artist has been updated');
        } else {
            return redirect()->route('artist.index')->with('error', 'Artist not updated');
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
            $bunny = new \App\Services\BunnyCDNService();
            $deleted = $bunny->delete($artist->image);
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
