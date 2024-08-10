<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorySong;


class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ringtones  = StorySong::get();
        return view('content.song.index' , compact('ringtones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'song' => 'required|string', // Expecting a path as a string
        ]);
    
        $ringtone = new StorySong();
        $ringtone->title = $request->title;
        $ringtone->ringtone_path = $request->song; // Store the path directly
    
        if ($ringtone->save()) {
            return redirect()->route('settings.storysong.index')->with('success', 'Song was successfully created');
        } else {
            return redirect()->back()->with('error', 'Ringtone was not created successfully');
        }
    }
    
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // Find the existing ringtone record
        $ringtone = StorySong::find($id);
        
        if (!$ringtone) {
            return redirect()->back()->with('danger', 'Ringtone not found');
        }
    
        // Update the title
        $ringtone->title = $request->input('title');
        
        // Update the ringtone path if a new file is uploaded
        if ($request->hasFile('ringtone_path')) {
            // Delete the old ringtone file if it exists
            if ($ringtone->ringtone_path) {
                $oldPath = storage_path('app/public/' . $ringtone->ringtone_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
    
            // Store the new ringtone file
            $path = $request->file('ringtone_path')->store('ringtones', 'public');
            $ringtone->ringtone_path = $path;
        }
        
        // Save the updated record
        if ($ringtone->save()) {
            return redirect()->route('settings.storysong.index')->with('success', 'Song was successfully updated');
        } else {
            return redirect()->back()->with('danger', 'Song was not updated successfully');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ringtone = StorySong::find($id);
        
        if (!$ringtone) {
            return redirect()->route('settings.storysong.index')->with('danger', 'Ringtone not found');
        }
        
        // Delete the ringtone file if it exists
        if ($ringtone->ringtone_path) {
            $file_path = storage_path('app/public/' . $ringtone->ringtone_path);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        // Delete the ringtone record
        if ($ringtone->delete()) {
            return redirect()->route('settings.storysong.index')->with('success', 'Ringtone was successfully deleted');
        } else {
            return redirect()->route('settings.storysong.index')->with('danger', 'Ringtone was not deleted');
        }
    }
    

    public function deleteRingtone($id)
    {
       // echo $id;exit;
        $ringtone = Ringtone::find($id);
        if ($ringtone && isset($ringtone->ringtone_path)) {
            $path = public_path('storage/' . $ringtone->ringtone_path);
            if (file_exists($path)) {
                unlink($path);
            }
    
            // Remove the image filename from the model attribute
            if(!empty($ringtone)){
                $ringtone->delete(); 
            }
          
        }
        return redirect()->back()->with('success' , 'Ringtone  Deleted  Successfully');
    }
}
