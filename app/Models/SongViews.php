<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SongViews extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'song_views';

    protected $fillable = [
        'user_id',
        'artist_id'
    ];
}
