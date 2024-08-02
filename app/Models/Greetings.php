<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Greetings extends Model
{
    protected $connection = 'mongodb';
}