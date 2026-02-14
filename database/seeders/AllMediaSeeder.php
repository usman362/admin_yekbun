<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\AIVideo;
use App\Models\Clips;
use App\Models\Feed;
use App\Models\History;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clips = Clips::all();
        $ai_videos = AIVideo::all();
        $histories = History::all();
        $feeds = Feed::where('feed_type','videos')->get();

        foreach ($clips as $key => $clip) {
            Helpers::userMedia(
                $clip->_id, //media_id
                $clip->clip, //uri
                $clip->comments_count, //commentCount
                $clip->voice_comments_count, //voiceCount
                $clip->likes_count, //emojisCount
                $clip->views_count, //seenCount
                $clip->user_id, //user_id
                $clip->text, //text
                $clip->text_properties, //text_properties
                'ai_videos' //type
            );
        }

        foreach ($ai_videos as $key => $ai_video) {
            if(!empty($ai_video->video)){
                foreach($ai_video->video as $video){
                    Helpers::userMedia(
                        $ai_video->_id, //media_id
                        $video->path ?? $video['path'], //uri
                        $ai_video->comments_count, //commentCount
                        $ai_video->voice_comments_count, //voiceCount
                        $ai_video->likes_count, //emojisCount
                        $ai_video->views_count, //seenCount
                        $ai_video->user_id, //user_id
                        $ai_video->description, //text
                        null, //text_properties
                        'ai_videos' //type
                    );
                }
            }
        }

        foreach ($histories as $key => $history) {
            if(!empty($history->video)){
                foreach($history->video as $video){
                    Helpers::userMedia(
                        $history->_id, //media_id
                        $video->path ?? $video['path'], //uri
                        $history->comments_count, //commentCount
                        $history->voice_comments_count, //voiceCount
                        $history->likes_count, //emojisCount
                        $history->views_count, //seenCount
                        $history->user_id, //user_id
                        $history->description, //text
                        null, //text_properties
                        'history' //type
                    );
                }
            }
        }

        foreach ($feeds as $key => $feed) {
            if(!empty($feed->video)){
                foreach($feed->videos as $video){
                    Helpers::userMedia(
                        $feed->_id, //media_id
                        $video->path ?? $video['path'], //uri
                        $feed->comments_count, //commentCount
                        $feed->voice_comments_count, //voiceCount
                        $feed->likes_count, //emojisCount
                        $feed->views_count, //seenCount
                        $feed->user_id, //user_id
                        $feed->description, //text
                        null, //text_properties
                        'user_feeds' //type
                    );
                }
            }
        }
    }
}
