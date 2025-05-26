<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPlay extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'video_play';

    protected $fillable = [
        'user_id',
        'video_id',
    ];
}
