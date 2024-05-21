<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory, LogsActivity;

    protected $casts = [
        'album' => 'array'
     ];
     protected $attributes = [
        'album' => '[]'
     ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
    public function artist(){
          return $this->belongsTo(Artist::class, 'artist_id');
    }

    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => asset('storage/'.$value),
    //     );
    // }
}
