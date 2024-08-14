<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Log;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStoryRequest;
use App\Helpers\Helpers;

use App\Http\Requests\UpdateStoryRequest;
use App\Models\Cards;


class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = null;
        if (request()->app)
            $app = request()->app;

        $stories = Story::where('app', $app?? 'main')->get();

        return view("content.stories.index", compact("stories", "app"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoryRequest $request)
    {
        $validated = $request->validated();

        $thumbnailPath = $validated["thumbnail_path"]?? null; // Get thumbnail path if exists in request
        if ($request->hasFile('thumbnail')) { // Store actual thumbnail if thumbnail file exists
            $thumbnailPath = $request->thumbnail->store("/stories", "public");
            $validated["thumbnail_path"] = $thumbnailPath;
        }

        $mediaPath = $validated["media_path"]?? null; // Get media path if exists in request
        if ($request->hasFile('media')) { // Store actual media if media file exists
            $mediaPath = $request->media->store("/stories", "public");
            $validated["media_path"] = $mediaPath;
        }

        $story = Story::create($validated);

        return back()->with("success", "Story successfully created.");
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
    public function update(UpdateStoryRequest $request, $id)
    {
        $validated = $request->validated();

        $thumbnailPath = $validated["thumbnail_path"]?? null; // Get thumbnail path if exists in request
        if ($request->hasFile('thumbnail')) { // Store actual thumbnail if thumbnail file exists
            $thumbnailPath = $request->thumbnail->store("/stories", "public");
            $validated["thumbnail_path"] = $thumbnailPath;
        }

        $mediaPath = $validated["media_path"]?? null; // Get media path if exists in request
        if ($request->hasFile('media')) { // Store actual media if media file exists
            $mediaPath = $request->media->store("/stories", "public");
            $validated["media_path"] = $mediaPath;
        }

        $story = Story::find($id);
        $story->fill($validated);
        $story->save();

        return back()->with("success", "Story successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);

        // Delete thumbnail
        if ($story->thumbnail_path)
            Storage::delete($story->thumbnail_path);

        // Delete media
        if ($story->media_path)
            Storage::delete($story->media_path);

        $story->delete();

        return back()->with("success", "Story successfully deleted.");
    }

    public function deleteStoryThumbnail($id)
    {
        $story = Story::find($id);
        if ($story && isset($story->thumbnail_path)) {
            $path = public_path('storage/' . $story->thumbnail_path);
            if (file_exists($path)) {
                unlink($path);
            }
    
            // Remove the image filename from the model attribute
            $story->thumbnail_path = null;
            $story->save();
        }
        
        return [
            'status' => true
        ];
    }

    public function deleteStoryMedia($id)
    {
        $story = Story::find($id);
        if ($story && isset($story->media_path)) {
            $path = public_path('storage/' . $story->media_path);
            if (file_exists($path)) {
                unlink($path);
            }
    
            // Remove the image filename from the model attribute
            $story->media_path = null;
            $story->save();
        }
        
        return [
            'status' => true
        ];
    }
    public function ManageStories(){
       return view('content.stories.ManageStories');
    }
    
    
     public function ManageStoriestwo(){
       return view('content.stories.ReportedStories');
    }
 
public function Listcard()
{
    $cards=Cards::get();

    return view('content.stories.cards.index',compact('cards'));
}
public function Cardstore(Request $request)
{
    $request->validate([
        'card_name' => 'required'
    ]);

    $model = new Cards();
    $model->name = $request->card_name;
    if (!empty($request->card_image)) {
        $imgPath = Helpers::fileUpload($request->card_image, "images/card_image");
        $model->image = $imgPath;
    }
    if ($model->save()) {
        return redirect()->route('list.cards')->with('success', 'Card   Has been inserted');
    } else {
        return redirect()->route('list.cards')->with('error', ' Failed to add Cards');
    }
}

public function destroycard(Cards $card)
{
    try {
        Log::info('Attempting to delete card with ID: ' . $card->_id);
        $card->delete();
        Log::info('Successfully deleted card with ID: ' . $card->_id);
        return redirect()->route('list.cards')->with('success', 'Card has been deleted!');
    } catch (\Exception $e) {
        Log::error('Error deleting Card: ' . $e->getMessage());
        return redirect()->route('list.cards')->with('error', 'Something went wrong!');
    }
}


}
