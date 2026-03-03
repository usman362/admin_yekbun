<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class AppVersion extends Model
{
    use HasFactory;

    protected $fillable = ['version_number'];
}
