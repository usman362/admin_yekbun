<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'price',
        'quantity',
        'image',
        'type',
        'data_id',
    ];

    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
