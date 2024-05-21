<?php

namespace App\Http\Controllers\Admin\Settings;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ringtone;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ringtones = Ringtone::all();
        return view("content.apps.app-ringtone",compact('ringtones'));
    }
    /**
     * Display a listing of the resource for message ringtone with ringType.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessage()
    {
        $ringtones = Ringtone::where('ringType', 1)->get();
        $ringType = 1;

        return view("content.apps.app-ringtone",compact('ringtones', 'ringType'));
    }
    /**
     * Display a listing of the resource for call ringtone with ringType.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCall()
    {
        $ringtones = Ringtone::where('ringType', 2)->get();
        $ringType = 2;
        return view("content.apps.app-ringtone",compact('ringtones', 'ringType'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->audio_paths)){
            foreach ($request->audio_paths as $key => $path) {
                $ringtone = Ringtone::updateOrCreate(['_id' => $request->id], [
                    'fileName' => $request->audio_filename[$key],
                    'filePath' => $path,
                    'fileSize' => $request->audio_size[$key]
                ]);
            }
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ringtone = Ringtone::find($id);
        try {
            $ringtone->delete();
        } catch (\Throwable $e) {
            return back()->with('success', 'Ringtone has been deleted');
        }
    }
}
