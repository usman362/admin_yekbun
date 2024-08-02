<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Eloquent;

class Country extends Model
{
    protected $connection = 'mongodb';

    
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'conid');
    }

    public function states() {
        return $this->hasMany('App\Models\States','country_id', 'conid');
    }

    /*
    public function states()
    {
        return $this->hasMany(States::class, 'country_id', 'conid');
    }
*/

}

