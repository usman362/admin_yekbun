<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MusicPlay extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'music_play';

    protected $fillable = [
        'music_id',
        'user_id',
    ];
}
