<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class LanguageSection extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'language_sections';

    protected $fillable = ['name', 'language_id'];

    use HasFactory;

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function details()
    {
        return $this->hasMany(LanguageDetail::class,'section_id','id');
    }
}
