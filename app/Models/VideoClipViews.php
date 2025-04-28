<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class VideoClipViews extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'video_clip_views';

    protected $fillable = [
        'user_id',
        'artist_id'
    ];
}
