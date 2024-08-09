<?php

namespace App\Http\Controllers;
use App\Models\StorySong;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
      //  dd("helo");
        $storysong = StorySong::all();
        return view("content.apps.add-songs",compact('storysong'));
    }
    public function getMessage()
    {
        $storysong = StorySong::where('songType', 1)->get();
        $songType = 1;

        return view("content.apps.add-songs",compact('storysong', 'songType'));
    }
    public function getCall()
    {
        $storysong = StorySong::where('songType', 2)->get();
        $songType = 2;
        return view("content.apps.add-songs",compact('storysong', 'songType'));
    }
    public function store(Request $request)
    {
        $response_msg = $request->songType == "1" ? "Message" : "Call";
        if(!empty($request->audio_paths)){
            foreach ($request->audio_paths as $key => $path) {
                try {
                    $storysong = StorySong::updateOrCreate(['_id' => $request->id], [
                        'fileName' => $request->audio_filename[$key],
                        'filePath' => $path,
                        'ringType' => intval($request->songType),
                        'fileSize' => $request->audio_size[$key]
                    ]);
                } catch (\Throwable $e) {
                    return back()->with('success', $response_msg.' Song has been updated');
                }
            }
            return back()->with('success', $response_msg.' Song has been updated');
        } else {
            return redirect()->back();
        }

    }
    public function destroy($id)
    {
        try {
            $storysong = StorySong::find($id);
            if (!$storysong) {
                return back()->with('error','Song not found.');
            }
            $storysong->delete();
            return back()->with('success','Song has been deleted.');

        } catch (\Exception $e) {
            return back()->with('error','Failed to delete Song.');
        }
    }
}
