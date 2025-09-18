<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class VotingViews extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'voting_views';

    protected $fillable = [
        'user_id',
        'voting_id',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }
}
