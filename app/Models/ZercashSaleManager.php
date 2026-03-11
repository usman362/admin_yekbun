<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZercashSaleManager extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'zercash_sale_managers';

    protected $fillable = [
        'name',
        'country',
        'code',
        'city',
        'zer_in_treasur',
        'total_shops',
        'join_date',
        'total_win',
        'image',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'zer_in_treasur' => 'float',
        'total_shops' => 'integer',
        'total_win' => 'float',
        'sort_order' => 'integer',
    ];
}
