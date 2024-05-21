<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'songs';

    protected $fillable = [
        'name',
        'category_id',
        'music_id',
        'artist_id',
        'album_id',
        'audio',
        'file_size',
        'length',
        'status',
    ];

    protected $casts = [
        'audio' => 'string'
     ];
     protected $attributes = [
        'audio' => ''
     ];

    public function music_category(){
        return $this->belongsTo(MusicCategory::class , 'category_id' );
    }
    public function music(){
        return $this->belongsTo(Music::class , 'music_id' );
    }

    public function artist(){
        return $this->belongsTo(Artist::class , 'artist_id');
    }

    public function album(){
        return $this->belongsTo(Album::class , 'album_id');
    }
}
