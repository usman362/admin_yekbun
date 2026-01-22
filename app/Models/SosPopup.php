<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SosPopup extends Model
{
    use HasFactory;

    protected $table = 'sos_popup';

    protected $fillable = [
        'user_id',
        'sos_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sos()
    {
        return $this->belongsTo(PopFeeds::class, 'sos_id', '_id')
            ->where('type', 'SOS');
    }
}
