<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class HistoryLikes extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'history_likes';

    protected $fillable = [
        'user_id',
        'history_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feed()
    {
        return $this->belongsTo(History::class);
    }

}
