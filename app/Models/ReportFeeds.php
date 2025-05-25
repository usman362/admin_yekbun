<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFeeds extends Model
{
    use HasFactory;

  protected $fillable = [
        'user_id',
        'report_type',
        'feed_id',
    ];
   public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function feeds()
    {
        return $this->belongsTo(Feed::class);
    }





}
