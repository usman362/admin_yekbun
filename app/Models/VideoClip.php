<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class VideoClip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'music_id',
        'artist_id',
        'thumbnail',
        'video',
        'file_size',
        'length',
        'status',
    ];

    // protected $casts = [
    //     'video' => 'array'
    //  ];
    //  protected $attributes = [
    //     'video' => '[]'
    //  ];

    public function music_category(){
        return $this->belongsTo(MusicCategory::class , 'category_id' );
    }
    public function music(){
        return $this->belongsTo(Music::class , 'music_id' );
    }

    public function artist(){
        return $this->belongsTo(Artist::class , 'artist_id');
    }
}
