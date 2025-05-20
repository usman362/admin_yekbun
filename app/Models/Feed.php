<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable=[
        'feed_background_image',
        'feed_text_color',
        'grid_style',
        'user_id',
        'image_type',
        'description',
        'user_type',
        'feed_type',
        'image',
        'image_file_name',
        'image_file_length',
        'image_file_size',
        'video',
        'video_file_name',
        'video_file_length',
        'video_file_size',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($feed) {
            $lastFeed = self::orderBy('id', 'desc')->first();
            $lastId = $lastFeed ? intval(substr($lastFeed->custom_id, 2)) : 99;
            $feed->custom_id = 'FE-' . ($lastId + 1);
        });
    }

    public function background(){
        return $this->hasMany(BackgroundFeed::class  , 'id' , 'background_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_feeds', 'feed_id', 'collection_id');
    }
    public function reactions(){

        return $this->hasMany(Reaction::class , 'feed_id');
    }
    public function comments()
    {
        return $this->hasMany(FeedComments::class,'feed_id')->where('comment_type','normal');
    }
    public function voice_comments()
    {
        return $this->hasMany(FeedComments::class,'feed_id')->where('comment_type','audio');
    }
    public function shares()
    {
        return $this->hasMany(FeedShare::class,'feed_id');
    }
    public function likes()
    {
        return $this->hasMany(FeedLikes::class,'feed_id');
    }
    public function views()
    {
        return $this->hasMany(FeedViews::class,'feed_id');
    }
    public function users()
    {
        return $this->hasMany(User::class , 'id' , 'user_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'reported_post_id', 'id');
    }
}
