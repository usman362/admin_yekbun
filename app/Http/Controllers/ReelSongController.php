<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealSong;


class ReelSongController extends Controller
{
    public function index()
    {
        $StorySongs  = RealSong::all();
        return view("content.reelsong.index",compact('StorySongs'));
    }
    public function getMessage()
    {
        $ringtones = RealSong::where('ringType', 1)->get();
        $ringType = 1;

        return view("content.reelsong.index",compact('ringtones', 'ringType'));
    }
    public function getCall()
    {
        $ringtones = RealSong::where('ringType', 2)->get();
        $ringType = 2;
        return view("content.apps.app-ringtone",compact('ringtones', 'ringType'));
    }
    public function store(Request $request)
    {
       // dd($request->all());
        $response_msg = $request->ringType == "1" ? "Song" : "Song";
        if(!empty($request->audio_paths)){
            foreach ($request->audio_paths as $key => $path) {
                try {
                    $ringtone = RealSong::updateOrCreate(['_id' => $request->id], [
                        'fileName' => $request->audio_filename[$key],
                        'filePath' => $path,
                        'ringType' => intval($request->ringType),
                        'fileSize' => $request->audio_size[$key]
                    ]);
                } catch (\Throwable $e) {
                    return back()->with('success', $response_msg.'  has been created');
                }
            }
            return back()->with('success', $response_msg.'  has been updated');
        } else {
            return redirect()->back();
        }

    }
    public function destroy($id)
    {
        try {
            $ringtone = RealSong::find($id);
            if (!$ringtone) {
                return back()->with('error','Song not found.');
            }
            $ringtone->delete();
            return back()->with('success','Song has been deleted.');

        } catch (\Exception $e) {
            return back()->with('error','Failed to delete Song.');
        }
    }
}
