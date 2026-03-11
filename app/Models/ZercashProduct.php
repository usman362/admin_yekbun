<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZercashProduct extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'zercash_products';

    protected $fillable = [
        'setting_id',
        'category',
        'name',
        'description',
        'image',
        'badge',
        'zer_amount',
        'fiat_amount',
        'fiat_currency',
        'cashback_percent',
        'songs_count',
        'features',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'zer_amount' => 'float',
        'fiat_amount' => 'float',
        'cashback_percent' => 'float',
        'songs_count' => 'integer',
        'features' => 'array',
        'sort_order' => 'integer',
    ];

    public function setting()
    {
        return $this->belongsTo(ZercashSetting::class, 'setting_id', '_id');
    }
}
