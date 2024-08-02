<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Translation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'translations';

    use HasFactory;
    protected $fillable =[
        'text_id',
        'translation',
        'language_id',
        'language_code',
    ];

    public function language ()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function text ()
    {
        return $this->belongsTo(Text::class, 'text_id');
    }
}
