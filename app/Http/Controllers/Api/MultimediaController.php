<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\PermissionHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\ArtistFavorite;
use App\Models\MusicPlay;
use App\Models\Song;
use App\Models\SongViews;
use App\Models\User;
use App\Models\Video;
use App\Models\UserPlaylist;
use App\Models\UserPlaylistGroup;
use App\Models\VideoClip;
use App\Models\VideoClipViews;
use App\Models\VideoPlay;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function getAllSongsPublic()
    {
        $songs = Song::with('artist')->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($songs, 'All Songs Fetch Successfully!');
    }

    public function getAllClipsPublic()
    {
        $videos = VideoClip::with('artist')->orderBy('created_at', 'desc')->get();
        return ResponseHelper::sendResponse($videos, 'All Video Clips Fetch Successfully!');
    }

    public function getSongByArtists(Request $request, $id)
    {
        $artist = Artist::with(['province' => function ($q) {
            $q->with('country');
        }])->find($id);
        $songs = Song::with('playlists')->where('artist_id', $id)->get();
        return ResponseHelper::sendResponse(['artist' => $artist, 'songs' => $songs], 'Songs Fetch Successfully!');
    }

    public function getClipsByArtists(Request $request, $id)
    {
        $artist = Artist::with(['province' => function ($q) {
            $q->with('country');
        }])->find($id);
        $videos = VideoClip::with('playlists')->where('artist_id', $id)->get();
        return ResponseHelper::sendResponse(['artist' => $artist, 'videos' => $videos], 'Video Clips Fetch Successfully!');
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

    public function getArtistsPublic()
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
            return ResponseHelper::sendResponse([], 'Failed to Add Artist!', false, 403);
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
            return ResponseHelper::sendResponse([], 'Failed to Update Artist!', false, 403);
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
            return ResponseHelper::sendResponse([], 'Artist  has been deleted successfully!');
        } else {
            return ResponseHelper::sendResponse([], 'Failed to Delete Artist!', false, 403);
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
            return ResponseHelper::sendResponse([], 'Failed to Change Status', false, 403);
        }
    }

    public function getArtistDetail(Request $request, $id)
    {
        $artist = Artist::with(['province' => function ($q) {
            $q->with('country');
        }])->with(['songs' => function ($q) {
            $q->with('playlists');
        }])->with(['videos' => function ($q) {
            $q->with('playlists');
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

    public function playMusic(Request $request, $id)
    {

        $allowRequest = PermissionHelper::checkPermission(auth()->user()->level, 'music_allow_music');
        if ($allowRequest !== true) {
            return ResponseHelper::sendResponse([], 'You are not Allowed to Use Musics.', false, 409);
        }

        $userId = auth()->id();
        $today = Carbon::today();

        // 1. Delete old records (only keep today’s)
        MusicPlay::where('user_id', $userId)
            ->whereDate('created_at', '<', $today)
            ->delete();

        // 2. Count today's unique music plays
        $todayPlayCount = MusicPlay::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->distinct('music_id')
            ->count('music_id');

        // 3. Check if user already played this music today
        $alreadyPlayed = MusicPlay::where('user_id', $userId)
            ->where('music_id', $id)
            ->whereDate('created_at', $today)
            ->exists();

        $musicCounnt = PermissionHelper::checkPermission(auth()->user()->level, 'music_daily_songs');
        // 4. If not played and limit reached, reject
        if (!$alreadyPlayed && $todayPlayCount >= $musicCounnt) {
            return ResponseHelper::sendResponse([], 'Your daily music play limit has been exceeded.', false, 409);
        }

        // 5. Log the music play
        MusicPlay::create([
            'user_id' => $userId,
            'music_id' => $id,
        ]);

        return ResponseHelper::sendResponse([], 'Music played successfully.');
    }

    public function playVideo(Request $request, $id)
    {
        $allowRequest = PermissionHelper::checkPermission(auth()->user()->level, 'video_allow_video');
        if ($allowRequest !== true) {
            return ResponseHelper::sendResponse([], 'You are not Allowed to Use Videos.', false, 409);
        }

        $userId = auth()->id();
        $today = Carbon::today();

        // 1. Delete old records (only keep today’s)
        VideoPlay::where('user_id', $userId)
            ->whereDate('created_at', '<', $today)
            ->delete();

        // 2. Count today's unique video plays
        $todayPlayCount = VideoPlay::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->distinct('video_id')
            ->count('video_id');

        // 3. Check if user already played this video today
        $alreadyPlayed = VideoPlay::where('user_id', $userId)
            ->where('video_id', $id)
            ->whereDate('created_at', $today)
            ->exists();

        $videoCounnt = PermissionHelper::checkPermission(auth()->user()->level, 'video_daily_videos');
        // 4. If not played and limit reached, reject
        if (!$alreadyPlayed && $todayPlayCount >= $videoCounnt) {
            return ResponseHelper::sendResponse([], 'Your daily video play limit has been exceeded.', false, 409);
        }

        // 5. Log the video play
        VideoPlay::create([
            'user_id' => $userId,
            'video_id' => $id,
        ]);

        return ResponseHelper::sendResponse([], 'Video played successfully.');
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
            return ResponseHelper::sendResponse([], 'Failed to Save Artist Views', false, 403);
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
            return ResponseHelper::sendResponse([], 'Failed to Save Artist Views', false, 403);
        }
    }

    public function store_artist_favorites(Request $request, $id)
    {
        $allowRequest = PermissionHelper::checkPermission(auth()->user()->level, 'music_favorite_artist');
        if ($allowRequest !== true) {
            return ResponseHelper::sendResponse([], 'You are not Allowed to Add Artist as Favorite.', false, 409);
        }
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
            return ResponseHelper::sendResponse([], 'Artist Favorites has been Successfully Saved!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Failed to Save Artist Favorites', false, 403);
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
            }])->with(['video' => function ($a) {
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
            return ResponseHelper::sendResponse([], 'Failed to Create Playlist!', false, 403);
        }
    }

    public function storeSongsPlaylist(Request $request)
    {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required',
        ]);
        try {
            $exists = UserPlaylist::where('user_id', auth()->user()->id)->where('media_id', $request->media_id)->where('playlist_id', $request->playlist_id)->first();
            if (!empty($exists)) {
                return ResponseHelper::sendResponse([], 'Already Added in Playlist!', false, 403);
            }
            $playlist = UserPlaylist::create([
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
            return ResponseHelper::sendResponse([], 'Failed to Create Playlist!', false, 403);
        }
    }

    public function getClipsPlaylist(Request $request)
    {
        $userId = auth()->user()->id;

        $playlists = UserPlaylistGroup::with(['clip_playlists' => function ($q) {
            $q->with(['video' => function ($a) {
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

            $playlists = UserPlaylistGroup::with(['clip_playlists' => function ($q) {
                $q->with(['video' => function ($a) {
                    $a->with('artist');
                }]);
            }])->where('user_id', $userId)->get();
        }

        return ResponseHelper::sendResponse($playlists, 'Clips Playlist has been Fetch Successfully!');
    }

    public function storeClipsPlaylist(Request $request)
    {
        $request->validate([
            'media_id' => 'required',
            'playlist_id' => 'required',
        ]);
        try {
            $exists = UserPlaylist::where('user_id', auth()->user()->id)->where('media_id', $request->media_id)->where('playlist_id', $request->playlist_id)->first();
            if (!empty($exists)) {
                return ResponseHelper::sendResponse([], 'Already Added in Playlist!', false, 403);
            }
            $playlist = UserPlaylist::create([
                'user_id' => auth()->user()->id,
                'media_id' => $request->media_id,
                'playlist_id' => $request->playlist_id,
                'type' => 'video'
            ]);
            $playlists = UserPlaylistGroup::with(['clip_playlists' => function ($q) {
                $q->with(['video' => function ($a) {
                    $a->with('artist');
                }]);
            }])->where('user_id', auth()->user()->id)->get();
            return ResponseHelper::sendResponse($playlists, 'Clips Playlist has been Created Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Failed to Create Playlist!', false, 403);
        }
    }

    public function deletePlaylistGroup($id)
    {
        $group = UserPlaylistGroup::find($id);
        if (!$group) {
            return ResponseHelper::sendResponse([], 'Playlist Group not found.', false, 404);
        }
        $playlists = UserPlaylist::where('playlist_id', $id)->get();
        try {
            if ($playlists) {
                foreach ($playlists as $playlist) {
                    $playlist->delete();
                }
            }
            $group->delete();
            return ResponseHelper::sendResponse([], 'Playlist has been Deleted Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Something Went Wrong!', false, 403);
        }
    }

    public function deletePlaylist($id)
    {
        $playlist = UserPlaylist::find($id);
        if (!$playlist) {
            return ResponseHelper::sendResponse([], 'Song not found.', false, 404);
        }

        try {
            $playlist->delete();
            return ResponseHelper::sendResponse([], 'Song has been Deleted Successfully!');
        } catch (\Exception $e) {
            return ResponseHelper::sendResponse([], 'Something Went Wrong!', false, 500);
        }
    }

    public function movePlaylist(Request $request, $id)
    {
        $request->validate([
            'playlist_id' => 'required'
        ]);
        $playlist = UserPlaylist::find($id);
        $group = UserPlaylistGroup::find($request->playlist_id);
        if (!$playlist) {
            return ResponseHelper::sendResponse([], 'Song not found.', false, 404);
        }

        if (!$group) {
            return ResponseHelper::sendResponse([], 'Playlist not found.', false, 404);
        }

        try {
            $playlist->playlist_id = $request->playlist_id;
            $playlist->save();
            return ResponseHelper::sendResponse([], 'Song has been Moved Successfully!');
        } catch (\Exception $e) {
            return ResponseHelper::sendResponse([], 'Something Went Wrong!', false, 500);
        }
    }

    public function editPlaylist(Request $request, $id)
    {
        try {
            $group = UserPlaylistGroup::find($id);
            $group->title = $request->title;
            $group->save();
            return ResponseHelper::sendResponse($group, 'Playlist has been Updated Successfully!');
        } catch (Exception $e) {
            return ResponseHelper::sendResponse([], 'Playlist has been Updated Successfully!', false, 403);
        }
    }

    public function mediaTrimmer(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimetypes:audio/*,video/*',
            'startTime' => 'required|numeric|min:0',
            'endTime' => 'required|numeric|min:0|gt:startTime',
        ]);

        // Upload the original file
        $originalPath = $request->file('file')->store('public/media/originals');

        // Get full paths
        $storagePath = storage_path('app/' . $originalPath);
        $trimmedName = 'trimmed_' . Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
        $trimmedPath = storage_path('app/public/media/trimmed/' . $trimmedName);

        // Ensure trimmed directory exists
        Storage::makeDirectory('public/media/trimmed');

        // Run FFmpeg trim command
        $start = escapeshellarg($request->startTime);
        $duration = escapeshellarg($request->endTime - $request->startTime);

        $command = "ffmpeg -ss $start -i " . escapeshellarg($storagePath) . " -t $duration -c copy " . escapeshellarg($trimmedPath);
        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            return ResponseHelper::sendResponse([],'Trimming failed.',false,500);
        }

        // Optional: Delete original file if not needed
        Storage::delete($originalPath);

        // Return URL to trimmed file
        $url = '/media/trimmed/' . $trimmedName;
        return ResponseHelper::sendResponse($url,'Trimmed file uploaded successfully!');
    }
}
