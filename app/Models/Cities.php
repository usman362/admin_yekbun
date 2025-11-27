<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cities extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'cities';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function country()
    {
        return $this->belongsTo(Countries::class,'country_id','conid');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}




