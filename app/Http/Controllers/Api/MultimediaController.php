<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Video;
use App\Models\VideoClip;
use Exception;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function getAllSongs()
    {
        $songs = Song::with('artist')->get();
        return ResponseHelper::sendResponse($songs, 'All Songs Fetch Successfully!');
    }

    public function getAllClips()
    {
        $videos = VideoClip::with('artist')->get();
        return ResponseHelper::sendResponse($videos, 'All Video Clips Fetch Successfully!');
    }

    public function getSongByArtists(Request $request, $id)
    {
        $songs = Song::where('artist_id', $id)->get();
        return ResponseHelper::sendResponse($songs, 'Songs Fetch Successfully!');
    }

    public function getClipsByArtists(Request $request, $id)
    {
        $videos = VideoClip::where('artist_id', $id)->get();
        return ResponseHelper::sendResponse($videos, 'Video Clips Fetch Successfully!');
    }

    public function getArtists()
    {
        $artists = Artist::with(['songs', 'videos'])->get();
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
        $artist = Artist::with(['songs', 'videos'])->find($id);
        return ResponseHelper::sendResponse($artist, 'Artist Detail Fetch Successfully!');
    }
}
