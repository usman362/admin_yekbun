<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserPlaylist extends Model
{
    use HasFactory;

    protected $fillable =  [
        'playlist_id',
        'user_id',
        'media_id',
        'type',
    ];


    public function song()
    {
        return $this->belongsTo(Song::class, 'media_id');
    }

    public function video()
    {
        return $this->belongsTo(VideoClip::class, 'media_id');
    }
}
