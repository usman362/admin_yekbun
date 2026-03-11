<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZercashSetting extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'zercash_settings';

    protected $fillable = [
        'key',
        'label',
        'description',
        'default_currency',
        'allowed_currencies',
        'zer_to_euro',
        'zer_to_dollar',
        'treasury_sell_euro',
        'treasury_sell_dollar',
        'wallet_reserve',
        'transaction_fee_percent',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'allowed_currencies' => 'array',
        'is_active' => 'boolean',
        'zer_to_euro' => 'float',
        'zer_to_dollar' => 'float',
        'treasury_sell_euro' => 'float',
        'treasury_sell_dollar' => 'float',
        'wallet_reserve' => 'float',
        'transaction_fee_percent' => 'float',
        'sort_order' => 'integer',
    ];

    public function products()
    {
        return $this->hasMany(ZercashProduct::class, 'setting_id', '_id');
    }
}
