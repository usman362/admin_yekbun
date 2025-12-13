<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helpers;
use App\Helpers\ResponseHelper;
use App\Models\Collection;
use App\Traits\UploadMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function insert(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $collection = new Collection();
        $collection->title = $request->title;
        if ($request->hasFile('image')) {
            $path = Helpers::fileCDNUpload($request->image,'images/collections');
            $collection->image = $path;
        }

        $collection->user_id  = Auth::id();

        $collection->save();

        return ResponseHelper::sendResponse($collection,'Collection successfully created.');
    }

    public function add_to_collection(Request $request)
    {
        $collection = Collection::find($request->collection_id);
        if(!$collection){
            return ResponseHelper::sendResponse([],'Collection Not Found!',false,404);
        }

        $feed = Feed::find($request->feed_id);

        if(!$feed){
            return ResponseHelper::sendResponse([],'Feed Not Found!',false,404);
        }

        $collection->feeds()->sync([$request->feed_id]);

        return ResponseHelper::sendResponse($collection,'Successfully added to collection.');
    }

    public function get_collection()
    {
        $collection = Collection::where('user_id', Auth::id())->get();
        if (isset($collection)) {
            return ResponseHelper::sendResponse($collection,'Collections has been Fetched Successfully.');
        }
    }

    public function destroy($id)
    {

        $collection = Collection::find($id);
        if (isset($collection)) {
            if ($collection->delete($collection->id)) {
                return ResponseHelper::sendResponse($collection,'Collection has been Deleted Successfully.');
            }
        }else{
            return ResponseHelper::sendResponse([],'Collection Not Found!',false,404);
        }
    }

    public function listCollectionItems($collection_id)
    {
        $collection = Collection::with('feeds.user')
            ->find  ($collection_id);

        if(!$collection){
            return ResponseHelper::sendResponse([],'Collection Not Found!',false,404);
        }

        return ResponseHelper::sendResponse(
            $collection->feeds,
            'Collection feeds fetched successfully.'
        );
    }

}
