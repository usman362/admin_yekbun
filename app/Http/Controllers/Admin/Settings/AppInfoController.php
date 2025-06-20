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
            'house_number' => 'required',
            'city_zipcode' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $appInfo = AppInfo::updateOrCreate(['_id' => $request->id], [
                    'address' => $request->address,                    
                    'city_zipcode' => $request->city_zipcode,
                ]);
                $appInfo->description = $request->description;
                $appInfo->company_name = $request->company_name;
                $appInfo->house_number = $request->house_number;
               
                $appInfo->save();
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
