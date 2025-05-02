<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCode extends Model
{
    use HasFactory , LogsActivity;
    public $table = "user_codes";

    protected $casts = [
        'expires_at' => 'datetime',
    ];


    protected $fillable = [
        'user_id',
        'type',
        'expires_at',
        'email',
        'code',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id');
    }
}
