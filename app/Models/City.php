<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Eloquent;

class City extends Model
{
    protected $connection = 'mongodb';

    public function country() {
        return $this->belongsTo('App\Models\Country', 'country_id', 'conid');
    }
    

    public function state()
    {
        return $this->belongsTo('App\Models\States', 'state_id', 'stid');
    }
        
}