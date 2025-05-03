<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Helpers\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppInfo;
use Illuminate\Support\Facades\Validator;

class AppInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rquest)
    {
        try {
            $appInfo = AppInfo::all()->last();
        } catch (\Throwable $e) {
            $appInfo = "";
        }
        return view('content.apps.app-info', compact('appInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'address' => 'required',
            'description' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $appInfo = AppInfo::updateOrCreate(['_id' => $request->id], [
                    'address' => $request->address,
                    'time_from' => $request->time_from,
                    'time_to' => $request->time_to,
                    'description,' => $request->description,
                ]);
                if ($request->has('image')) {
                    $image_path = Helpers::fileUpload($request->image, 'images/appinfo');
                    $appInfo->image = $image_path;
                    $appInfo->save();
                }
            } catch (\Throwable $e) {
                return back()->with('success', 'App info has been created');
            }
            return back()->with('success', 'App info has been created');
        }
    }
}
