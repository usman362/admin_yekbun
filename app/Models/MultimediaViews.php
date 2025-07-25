<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MultimediaViews extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'multimedia_views';

    protected $fillable = [
        'user_id',
        'media_id',
        'media_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
