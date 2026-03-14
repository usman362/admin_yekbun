<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $collection = 'wallets';

    protected $fillable = [
        'user_id',
        'pin',
        'balance',
        'status',
        'status_reason',
        'activated_at'
    ];

    protected $casts = [
        'balance' => 'double',
        'activated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }
}
