<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class CommentsLike extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'comments_likes';

    protected $fillable = [
        'comment_id',
        'user_id',
        'emoji'
    ];


    public function feed()
    {
        return $this->belongsTo(Feed::class, 'comment_id');
    }
}
