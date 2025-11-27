<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Jenssegers\Mongodb\Eloquent\Model;
use Eloquent;
use Spatie\Activitylog\LogOptions;

class Countries extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'countries';

    use HasFactory;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


    public function cities()
    {
        return $this->hasMany(Cities::class, 'country_id', 'conid');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
