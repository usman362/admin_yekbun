<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ReportComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'report_type',
        'comment_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->belongsTo(FeedComments::class);
    }
}
