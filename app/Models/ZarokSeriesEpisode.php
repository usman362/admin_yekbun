<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ZarokSeriesEpisode extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'zarok_series_episode';

    protected $fillable = [
        'name',
        'series_id',
        'season_id',
        'video_file_name',
        'thumbnail',
        'video',
        'file_size',
        'video_file_size',
        'length',
        'video_file_length',
        'status',
    ];

    public function series()
    {
        return $this->belongsTo(ZarokSeries::class, 'series_id', '_id');
    }

    public function season()
    {
        return $this->belongsTo(ZarokSeriesSeason::class, 'season_id', '_id');
    }
}
