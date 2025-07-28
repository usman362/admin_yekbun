<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MalbatSeriesEpisode extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'malbat_series_episode';

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
        return $this->belongsTo(MalbatSeries::class, 'series_id', '_id');
    }

    public function season()
    {
        return $this->belongsTo(MalbatSeriesSeason::class, 'season_id', '_id');
    }
}
