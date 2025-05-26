<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportFeeds extends Model
{
    protected $fillable = ['feed_id', 'report_type'];

    public static function store($data)
    {
        $report = new self();
        $report->feed_id = $data['feed_id'];
        $report->report_type = $data['report_type'];
        $report->save();

        return $report;
    }
}

