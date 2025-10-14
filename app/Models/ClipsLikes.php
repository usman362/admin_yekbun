<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ClipsLikes extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'clips_likes';

    use HasFactory;

    public function clip()
    {
        return $this->belongsTo(Clips::class, 'clip_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
