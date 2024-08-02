<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Eloquent;

class States extends Model
{
    protected $connection = 'mongodb';

    public function country() {
        
        return $this->belongsTo('App\Models\Country', 'country_id', 'conid');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'stid', 'state_id');
    }
        

}