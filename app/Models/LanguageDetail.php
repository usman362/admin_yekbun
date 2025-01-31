<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class LanguageDetail extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'language_details';

    protected $fillable = ['section_name','main_section','section_id', 'language_id', 'keyword', 'translated'];

    use HasFactory;

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function section()
    {
        return $this->belongsTo(LanguageSection::class);
    }
}
