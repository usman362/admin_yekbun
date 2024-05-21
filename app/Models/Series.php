<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory , LogsActivity;
      
    protected $casts = [
        'series' => 'array'
     ];
     protected $attributes = [
        'series' => '[]'
     ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function series_category(){
        return $this->belongsTo(Category::class , 'category_id')->where('target' , 'series');
    }

}
