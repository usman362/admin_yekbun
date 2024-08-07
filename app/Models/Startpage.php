<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Startpage extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'startpages';
    use HasFactory;

    protected $fillable = [
        // 'language_id',
        'language',
        'our_policy',
        'login',
        'sign_up',
        'dear_guest ',
        'create_account'
    ];


    
}
