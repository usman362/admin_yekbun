<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZarokMovies;
use App\Models\ZarokSeries;
use App\Models\ZarokSeriesSeason;
use App\Models\ZarokSeriesEpisode;
use App\Models\ZarokStories;
use App\Models\ZarokVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TVController extends Controller
{
    public function zarokVideos()
    {
        $videos = ZarokVideos::all();
        return view('content.zarok-tv.videos',compact('videos'));
    }

    public function zarokVideosStore(Request $request)
    {
        try {
            $vc = new ZarokVideos();
            if ($request->video_id) {
                $vc = ZarokVideos::find($request->video_id);
            }
            //$vc->video_file_name = $request->title; // $request->video_name[0];

            if ($request->hasFile('images')) {
                $image = $request->file('images');

                // Create a unique filename
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Target directory inside storage/app/public/
                $folder = 'zarok-videos';

                // Ensure the folder exists
                if (!Storage::exists('public/' . $folder)) {
                    Storage::makeDirectory('public/' . $folder);
                }

                // Save the image
                $image->storeAs('public/' . $folder, $imageName);

                // Save the relative path to DB
                $vc->banner = $folder . '/' . $imageName;
            }

            $vc->video_file_name = !empty($request->title) ? $request->title : ($request->video_name[0] ?? null);
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            $vc->save();
            return redirect()->back()->with('success', 'Video clip Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add video clip');
        }
    }
 
    public function zarokStories()
    {
        $videos = ZarokStories::all();
        return view('content.zarok-tv.stories',compact('videos'));
    }



    public function zarokStoriesStore(Request $request)
    {
       
        try {
            $vc = new ZarokStories();
            if ($request->video_id) {
                $vc = ZarokStories::find($request->video_id);
            }

            if ($request->hasFile('images')) {
                $image = $request->file('images');

                // Create a unique filename
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Target directory inside storage/app/public/
                $folder = 'zarok-stories';

                // Ensure the folder exists
                if (!Storage::exists('public/' . $folder)) {
                    Storage::makeDirectory('public/' . $folder);
                }

                // Save the image
                $image->storeAs('public/' . $folder, $imageName);

                // Save the relative path to DB
                $vc->banner = $folder . '/' . $imageName;
            }




            //$vc->video_file_name = $request->title; // $request->video_name[0];
            $vc->video_file_name = !empty($request->title) ? $request->title : ($request->video_name[0] ?? null);
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            $vc->save();
            return redirect()->back()->with('success', 'Stories Has been added');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Failed to add Stories');
        }
    }
    public function zarokMovies()
    {
        $videos = ZarokMovies::all();
        return view('content.zarok-tv.movies',compact('videos'));
    }

    

    public function zarokStories_delete($id)
    {
        try {
            $story = ZarokStories::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            if ($story->banner && Storage::disk('public')->exists($story->banner)) {
                Storage::disk('public')->delete($story->banner);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Story deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    public function zarokVideos_delete($id)
    {
        try {
            $story = zarokVideos::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            if ($story->banner && Storage::disk('public')->exists($story->banner)) {
                Storage::disk('public')->delete($story->banner);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Story deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    public function zarokSeries_delete($id){
        try {
            $story = zarokSeries::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Story deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    public function zarokSeason_delete($id){
        try {
            $story = zarokSeriesSeason::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Season deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    public function zarokEpisode_delete($id){
        try {
            $story = zarokSeriesEpisodes::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Episode deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    public function zarokMovies_delete($id)
    {
        try {
            $story = zarokMovies::findOrFail($id);

            // Delete video file
            if ($story->video && Storage::disk('public')->exists($story->video)) {
                Storage::disk('public')->delete($story->video);
            }

            // Delete thumbnail file
            if ($story->thumbnail && $story->thumbnail !== 'def.jpg' && Storage::disk('public')->exists($story->thumbnail)) {
                Storage::disk('public')->delete($story->thumbnail);
            }

            // Delete record from DB
            $story->delete();

            return redirect()->back()->with('success', 'Story deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete story.');
        }
    }

    


    public function zarokMoviesStore(Request $request)
    {
        try {
            $vc = new ZarokMovies();
            if ($request->video_id) {
                $vc = ZarokMovies::find($request->video_id);
            }
            //$vc->video_file_name = $request->video_name[0];
            $vc->video_file_name = !empty($request->title) ? $request->title : ($request->video_name[0] ?? null);
            $vc->date = $request->st_date;

            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $vc->description = $request->description;
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $vc->is_trailer = $request->is_trailer;

            if ($request->is_trailer == "0") {
                $vc->movie = $request->movie_real_path[0] ?? null;
                $vc->movie_file_size = $request->movie_real_size[0] ?? null;
                $vc->movie_file_length = $request->movie_real_name[0] ?? null;
            }
            
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;
            //banner images
            $vc->banner = "";
            $vc->label = "";

            $folder = 'zarok-movies';
            if (!Storage::exists('public/' . $folder)) {
                Storage::makeDirectory('public/' . $folder);
            }

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '_' . uniqid() . '.' . $banner->getClientOriginalExtension();
                $banner->storeAs('public/' . $folder, $bannerName);
                $vc->banner = $folder . '/' . $bannerName;
            }

            if ($request->hasFile('label')) {
                $label = $request->file('label');
                $labelName = 'label_' . time() . '_' . uniqid() . '.' . $label->getClientOriginalExtension();
                $label->storeAs('public/' . $folder, $labelName);
                $vc->label = $folder . '/' . $labelName;
            }

            
            $vc->save();
            return redirect()->back()->with('success', 'Movie Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Movie');
        }
    }
    public function zarokSeries()
    {
        $videos = ZarokSeries::all();
        return view('content.zarok-tv.series',compact('videos'));
    }

    public function zarokSeriesStoreEpisode(Request $request){
        try {
            $vc = new ZarokSeriesEpisode();
            if ($request->video_id) {
                $vc = ZarokSeriesEpisode::find($request->video_id);
            }
            $vc->video_file_name = !empty($request->name) ? $request->name : ($request->video_name[0] ?? null);
            $vc->series_id = $request->series;
            $vc->season_id = $request->season;
            $vc->date = $request->st_date;

            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $vc->description = $request->description;
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;

            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;


            $vc->save();


            return redirect()->back()->with('success', 'Episode Has been added');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Failed to add Series');
        }
    }

    
    public function zarokSeriesEpisodes($id){
        
        $video = ZarokSeries::with('episodes') // Ensure seasons is a relation
                ->where('_id', $id)
                ->first();

        if (!$video || !$video->seasons) {
            return response()->json(['html' => '<p>No Episodes found.</p>']);
        }

            //$html = view('content.zarok-tv.series_season', ['name', $vide->video_file_name, 'seasons' => $video->seasons])->render();
        $html = view('content.zarok-tv.series_episodes', [
            'name'    => $video->video_file_name,
            'seasons' => $video->episodes
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function zarokSeriesSeason($id){
        
        $video = ZarokSeries::with('seasons') // Ensure seasons is a relation
                ->where('_id', $id)
                ->first();

        if (!$video || !$video->seasons) {
            return response()->json(['html' => '<p>No seasons found.</p>']);
        }

            //$html = view('content.zarok-tv.series_season', ['name', $vide->video_file_name, 'seasons' => $video->seasons])->render();
        $html = view('content.zarok-tv.series_season', [
            'name'    => $video->video_file_name,
            'seasons' => $video->seasons
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function zarokSeriesStoreSeason(Request $request){
        try {
            $vc = new ZarokSeriesSeason();
            if ($request->video_id) {
                $vc = ZarokSeriesSeason::find($request->video_id);
            }
            $vc->video_file_name = !empty($request->name) ? $request->name : ($request->video_name[0] ?? null);
            $vc->series_id = $request->series;
            $vc->date = $request->st_date;

            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $vc->description = $request->description;
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;


            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $folder = 'zarok-series';
            if (!Storage::exists('public/' . $folder)) {
                Storage::makeDirectory('public/' . $folder);
            }

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '_' . uniqid() . '.' . $banner->getClientOriginalExtension();
                $banner->storeAs('public/' . $folder, $bannerName);
                $vc->banner = $folder . '/' . $bannerName;
            }

            if ($request->hasFile('label')) {
                $label = $request->file('label');
                $labelName = 'label_' . time() . '_' . uniqid() . '.' . $label->getClientOriginalExtension();
                $label->storeAs('public/' . $folder, $labelName);
                $vc->label = $folder . '/' . $labelName;
            }

            $vc->save();
            return redirect()->back()->with('success', 'Series Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Series');
        }
    }

    public function getSeasonsBySeries(Request $request)
    {
        $seasons = ZarokSeriesSeason::where('series_id', $request->series_id)->get();

        return response()->json($seasons);
    }

    public function zarokSeriesStore(Request $request)
    {
        try {
            $vc = new ZarokSeries();
            if ($request->video_id) {
                $vc = ZarokSeries::find($request->video_id);
            }
            $vc->video_file_name = !empty($request->movie_title) ? $request->movie_title : ($request->video_name[0] ?? null);
            $vc->date = $request->st_date;

            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $vc->description = $request->description;
            $vc->video = $request->video_paths[0];
            $vc->video_file_size = $request->video_sizes[0];
            $vc->video_file_length = $request->video_durations[0];
            $cleanedThumbnail = Str::after($request->thumbnail, 'storage/');
            $cleanedThumbnail = Str::before($cleanedThumbnail, '.jpg') . '.jpg';
            $vc->thumbnail = $cleanedThumbnail;


            $vc->is_hd = $request->has('check_hd') ? 1 : 0;
            $vc->is_4k = $request->has('check_4k') ? 1 : 0;
            $vc->is_uhd = $request->has('check_uhd') ? 1 : 0;
            $vc->is_qhd = $request->has('check_qhd') ? 1 : 0;
            $vc->is_atm = $request->has('check_atm') ? 1 : 0;
            $vc->is_v5 = $request->has('check_v5') ? 1 : 0;
            $vc->age_section = $request->selected_robox;

            $folder = 'zarok-series';
            if (!Storage::exists('public/' . $folder)) {
                Storage::makeDirectory('public/' . $folder);
            }

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '_' . uniqid() . '.' . $banner->getClientOriginalExtension();
                $banner->storeAs('public/' . $folder, $bannerName);
                $vc->banner = $folder . '/' . $bannerName;
            }

            if ($request->hasFile('label')) {
                $label = $request->file('label');
                $labelName = 'label_' . time() . '_' . uniqid() . '.' . $label->getClientOriginalExtension();
                $label->storeAs('public/' . $folder, $labelName);
                $vc->label = $folder . '/' . $labelName;
            }

            $vc->save();
            return redirect()->back()->with('success', 'Series Has been added');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Series');
        }
    }
}
