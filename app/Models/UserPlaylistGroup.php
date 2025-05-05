<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserPlaylistGroup extends Model
{
    use HasFactory;

    protected $fillable =  [
        'user_id',
        'title',
        'bg_image',
        'type',
    ];


    public function playlists()
    {
        return $this->hasMany(UserPlaylist::class, 'playlist_id');
    }
}
