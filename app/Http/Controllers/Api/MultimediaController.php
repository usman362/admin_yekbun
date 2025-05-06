<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\ArtistFavorite;
use App\Models\Song;
use App\Models\SongViews;
use App\Models\User;
use App\Models\Video;
use App\Models\UserPlaylist;
use App\Models\UserPlaylistGroup;
use App\Models\VideoClip;
use App\Models\VideoClipViews;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultimediaController extends Controller
{
    public function getAllSongs()
    {
        $songs = Song::with(['artist', 'playlists'])->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($songs, 'All Songs Fetch Successfully!');
    }

    public function getAllClips()
    {
        $videos = VideoClip::with(['artist', 'playlists'])->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($videos, 'All Video Clips Fetch Successfully!');
    }

    public function getSongByArtists(Request $request, $id)
    {
        $songs = Song::with(['artist', 'playlists'])->where('artist_id', $id)->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($songs, 'Songs Fetch Successfully!');
    }

    public function getClipsByArtists(Request $request, $id)
    {
        $videos = VideoClip::with(['artist', 'playlists'])->where('artist_id', $id)->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($videos, 'Video Clips Fetch Successfully!');
    }

    public function getArtists()
    {
        $alphabet = request('alphabet'); // e.g., ?alphabet=A

        $artists = Artist::when($alphabet, function ($query, $alphabet) {
            $query->where('name', 'LIKE', $alphabet . '%');
        })
            ->with([
                'songs',
                'videos',
                'province.country'
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return ResponseHelper::sendResponse($artists, 'All Artists Fetch Successfully!');
    }

    public function getFavArtists()
    {
        $artist_ids = ArtistFavorite::where('user_id', auth()->user()->id)->pluck('artist_id');
        $alphabet = request('alphabet'); // e.g., ?alphabet=A

        $artists = Artist::when($alphabet, function ($query, $alphabet) {
            $query->where('name', 'LIKE', $alphabet . '%');
        })->whereIn('id', $artist_ids)->with(['songs', 'videos', 'province' => function ($q) {
            $q->with('country');
        }])->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($artists, 'All Artists Fetch Successfully!');
    }

    public function getPopularArtists()
    {
        $alphabet = request('alphabet'); // e.g., ?alphabet=A

        $artists = Artist::when($alphabet, function ($query, $alphabet) {
            $query->where('name', 'LIKE', $alphabet . '%');
        })->with(['songs', 'videos', 'province' => function ($q) {
            $q->with('country');
        }])->orderBy('total_views', 'desc')->get();
        return ResponseHelper::sendResponse($artists, 'All Artists Fetch Successfully!');
    }

    public function storeArtist(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'image' => 'required'
        ]);
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = Helpers::fileUpload($request->image, 'images');
            }
            $artist = new Artist();
            $artist->name = $request->name;
            $artist->gender = $request->gender;
            $artist->status = $request->status;
            $artist->province_id = $request->province;
            $artist->image = $imagePath;
            $artist->save();

            return ResponseHelper::sendResponse($artist, 'Artist has been added successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Add Artist!', false, 403);
        }
    }

    public function updateArtist(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'image' => 'required'
        ]);
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = Helpers::fileUpload($request->image, 'images');
            }
            $artist = Artist::find($id);
            $artist->name = $request->name;
            $artist->gender = $request->gender;
            $artist->status = $request->status;
            $artist->province_id = $request->province;
            $artist->image = $imagePath;
            $artist->save();

            return ResponseHelper::sendResponse($artist, 'Artist has been Updated successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Update Artist!', false, 403);
        }
    }

    public function deleteArtist($id)
    {
        $artist = Artist::findorFail($id);
        if ($artist->image) {
            $image_path = public_path('storage/' . $artist->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        if ($artist->delete($artist->id)) {
            return ResponseHelper::sendResponse(null, 'Artist  has been deleted successfully!');
        } else {
            return ResponseHelper::sendResponse(null, 'Failed to Delete Artist!', false, 403);
        }
    }

    public function statusArtist(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $artist = Artist::find($id);
        $artist->status = $request->status;
        if ($artist->update()) {
            return ResponseHelper::sendResponse($artist, 'Status Has been Updated!');
        } else {
            return ResponseHelper::sendResponse(null, 'Failed to Change Status', false, 403);
        }
    }

    public function getArtistDetail(Request $request, $id)
    {
        $artist = Artist::with(['songs', 'videos', 'province' => function ($q) {
            $q->with('country');
        }])->find($id);
        $fav = ArtistFavorite::where('artist_id', $id)->where('user_id', auth()->user()->id)->get();
        $favourites = ArtistFavorite::where('artist_id', $id)->get();
        if ($fav->count() > 0) {
            $is_favorite = 1;
        } else {
            $is_favorite = 0;
        }
        return ResponseHelper::sendResponse(['artist' => $artist, 'is_favorite' => $is_favorite, 'favorite_count' => $favourites->count()], 'Artist Detail Fetch Successfully!');
    }

    public function store_artist_song_views(Request $request, $id)
    {
        try {
            $views = SongViews::updateOrCreate(
                ['user_id' => auth()->user()->id, 'artist_id' => $id],
                ['user_id' => auth()->user()->id, 'artist_id' => $id]
            );

            $songViews = SongViews::where('artist_id', $id)->get();
            $videoViews = VideoClipViews::where('artist_id', $id)->get();

            $artist = new Artist();
            $artist->song_views = $songViews->count();
            $artist->total_views = $songViews->count() + $videoViews->count();
            $artist->save();
            return ResponseHelper::sendResponse(['song_views' => $songViews->count(), 'video_views' => $videoViews->count(), 'total_views' => ($songViews->count() + $videoViews->count())], 'Artist Views has been Successfully Saved!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Save Artist Views', false, 403);
        }
    }

    public function store_artist_video_views(Request $request, $id)
    {
        try {
            $views = VideoClipViews::updateOrCreate(
                ['user_id' => auth()->user()->id, 'artist_id' => $id],
                ['user_id' => auth()->user()->id, 'artist_id' => $id]
            );

            $songViews = SongViews::where('artist_id', $id)->get();
            $videoViews = VideoClipViews::where('artist_id', $id)->get();

            $artist = new Artist();
            $artist->video_views = $videoViews->count();
            $artist->total_views = $songViews->count() + $videoViews->count();
            $artist->save();
            return ResponseHelper::sendResponse(['song_views' => $songViews->count(), 'video_views' => $videoViews->count(), 'total_views' => ($songViews->count() + $videoViews->count())], 'Artist Views has been Successfully Saved!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Save Artist Views', false, 403);
        }
    }

    public function store_artist_favorites(Request $request, $id)
    {
        try {
            $exists = ArtistFavorite::where('user_id', auth()->user()->id)->where('artist_id', $id)->first();
            if (!empty($exists)) {
                $exists->delete();
            } else {
                $favorites = ArtistFavorite::updateOrCreate(
                    ['user_id' => auth()->user()->id, 'artist_id' => $id],
                    ['user_id' => auth()->user()->id, 'artist_id' => $id]
                );
            }
            return ResponseHelper::sendResponse(null, 'Artist Favorites has been Successfully Saved!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Save Artist Favorites', false, 403);
        }
    }

    public function getSongsPlaylist(Request $request)
    {
        $userId = auth()->user()->id;

        $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
            $q->with(['song' => function ($a) {
                $a->with('artist');
            }]);
        }])->where('user_id', $userId)->get();

        if ($playlists->isEmpty()) {
            UserPlaylistGroup::create([
                'title' => 'My Playlist',
                'user_id' => $userId,
                'bg_image' => 'assets/img/playlistCover.jpg',
                'type' => 'free',
            ]);

            $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
                $q->with(['song' => function ($a) {
                    $a->with('artist');
                }]);
            }])->where('user_id', $userId)->get();
        }

        return ResponseHelper::sendResponse($playlists, 'Songs Playlist has been Fetch Successfully!');
    }

    public function getPlaylistDetail(Request $request, $id)
    {
        $userId = auth()->user()->id;

        $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
            $q->with(['song' => function ($a) {
                $a->with('artist');
            }]);
        }])->where('user_id', $userId)->find($id);

        return ResponseHelper::sendResponse($playlists, 'Playlist has been Fetch Successfully!');
    }

    public function storeGroupPlaylist(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        try {
            $playlist = UserPlaylistGroup::updateOrCreate(['id' => $request->id], [
                'user_id' => auth()->user()->id,
                'playlist_id' => $request->playlist_id,
                'type' => $request->type
            ]);
            return ResponseHelper::sendResponse($playlist, 'Songs Playlist has been Created Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Create Playlist!', false, 403);
        }
    }

    public function storeSongsPlaylist(Request $request)
    {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required',
        ]);
        try {
            $playlist = UserPlaylist::updateOrCreate(['id' => $request->id], [
                'user_id' => auth()->user()->id,
                'media_id' => $request->media_id,
                'playlist_id' => $request->playlist_id,
                'type' => 'audio'
            ]);
            $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
                $q->with(['song' => function ($a) {
                    $a->with('artist');
                }]);
            }])->where('user_id', auth()->user()->id)->get();
            return ResponseHelper::sendResponse($playlists, 'Songs Playlist has been Created Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Create Playlist!', false, 403);
        }
    }

    public function getClipsPlaylist(Request $request)
    {
        $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
            $q->with('video');
        }])->where('user_id', auth()->user()->id)->get();
        return ResponseHelper::sendResponse($playlists, 'Clips Playlist has been Fetch Successfully!');
    }

    public function storeClipsPlaylist(Request $request)
    {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required'
        ]);
        try {
            $playlist = UserPlaylist::updateOrCreate(['id' => $request->id], [
                'user_id' => auth()->user()->id,
                'media_id' => $request->media_id,
                'playlist_id' => $request->playlist_id,
                'type' => 'video'
            ]);
            $playlists = UserPlaylistGroup::with(['playlists' => function ($q) {
                $q->with('video');
            }])->where('user_id', auth()->user()->id)->get();
            return ResponseHelper::sendResponse($playlists, 'Clips Playlist has been Created Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Failed to Create Playlist!', false, 403);
        }
    }

    public function deletePlaylistGroup($id)
    {
        $group = UserPlaylistGroup::find($id);
        if (!$group) {
            return ResponseHelper::sendResponse(null, 'Playlist Group not found.', false, 404);
        }
        $playlists = UserPlaylist::where('playlist_id', $id)->get();
        try {
            if ($playlists) {
                foreach ($playlists as $playlist) {
                    $playlist->delete();
                }
            }
            $group->delete();
            return ResponseHelper::sendResponse(null, 'Playlist has been Deleted Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse(null, 'Something Went Wrong!', false, 403);
        }
    }

    public function deletePlaylist($id)
    {
        $playlist = UserPlaylist::find($id);

        if (!$playlist) {
            return ResponseHelper::sendResponse(null, 'Song not found.', false, 404);
        }

        try {
            $playlist->delete();
            return ResponseHelper::sendResponse(null, 'Song has been Deleted Successfully!');
        } catch (\Exception $e) {
            return ResponseHelper::sendResponse(null, 'Something Went Wrong!', false, 500);
        }
    }
}
