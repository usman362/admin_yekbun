<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\ReportComments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportCommentsController extends Controller
{
    public function index(Request $request, $id)
    {
        $reports = ReportComments::where('comment_id', $id)->get();
        return ResponseHelper::sendResponse($reports, 'Report Comments');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'report_type' => 'required'
        ]);

        $existingReport = ReportComments::where('user_id', auth()->id())
            ->where('comment_id', $id)
            ->exists();

        if ($existingReport) {
            return ResponseHelper::sendResponse(null, 'You have already reported this comment.', 400);
        }

        $report = ReportComments::updateOrCreate(
            ['id' => $request->report_id],
            [
                'comment_id' => $id,
                'report_type' => Str::slug($request->report_type),
                'user_id' => auth()->user()->id,
            ]
        );

        return ResponseHelper::sendResponse($report, 'Report Comments Successfully');
    }
}
