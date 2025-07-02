<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VideoClip extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'video_clips';

    protected $fillable = [
        'name',
        'video_file_name',
        'category_id',
        'music_id',
        'artist_id',
        'thumbnail',
        'video',
        'file_size',
        'video_file_size',
        'length',
        'video_file_length',
        'status',
    ];

    // protected $casts = [
    //     'video' => 'array'
    //  ];
    //  protected $attributes = [
    //     'video' => '[]'
    //  ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($history) {
            $lastHistory = self::orderBy('id', 'desc')->first();
            $lastId = $lastHistory ? intval(substr($lastHistory->custom_id, 2)) : 99;
            $history->custom_id = 'VC-' . ($lastId + 1);
        });
    }

    public function music_category(){
        return $this->belongsTo(MusicCategory::class , 'category_id' );
    }

    public function music(){
        return $this->belongsTo(Music::class , 'music_id' );
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function playlists()
    {
        return $this->hasMany(UserPlaylist::class, 'media_id')->where('user_id',Auth::id());
    }
}
