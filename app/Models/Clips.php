<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Clips extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'clips';

    use HasFactory;

    public function template()
    {
        return $this->belongsTo(ClipTemplates::class, 'template_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
