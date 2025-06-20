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
        'city' => 'required|string|max:255',
        'zipcode' => 'required|string|max:20',
        'address' => 'required|string|max:500',
        'house_number' => 'required|string|max:50',
        'description' => 'required|string|max:50',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $appInfo = AppInfo::updateOrCreate(
            ['_id' => $request->id],
            [
                'city' => $request->city,
                'zipcode' => $request->zipcode,
                'address' => $request->address,
                'house_number' => $request->house_number,
                'description' => $request->description,
            ]
        );
    } catch (\Throwable $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }

    return back()->with('success', 'App info has been saved successfully.');
}

}
