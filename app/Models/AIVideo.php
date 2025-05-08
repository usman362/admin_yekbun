<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AIVideo extends Model
{
    use HasFactory, LogsActivity;

    protected $connection = 'mongodb';
    protected $collection = 'ai_videos';

    protected $fillable=[
        'title',
        'category_id',
        'language',
        'image',
        'video'
    ];

    protected $casts = [
        'image' => 'array',
        'video' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ai_video) {
            $lastHistory = self::orderBy('created_at', 'desc')->first();
            $lastId = $lastHistory ? intval(substr($lastHistory->custom_id, 2)) : 99;
            $ai_video->custom_id = 'AI-' . ($lastId + 1);
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function gallery(){
        return $this->hasMany(PostGallery::class);
    }

    public function comments()
    {
        return $this->hasMany(FeedComments::class)->where('feed_type','ai_videos');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
