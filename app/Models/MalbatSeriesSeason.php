<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MalbatSeriesSeason extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'malbat_series_season';

    protected $fillable = [
        'name',
        'date',
        'description',
        'is_hd',
        'is_4k',
        'is_uhd',
        'is_qhd',
        'is_atm',
        'is_v5',
        'age_section',
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

    public function episodes()
    {
        return $this->hasMany(MalbatSeriesEpisode::class, 'season_id', '_id');
    }

}
