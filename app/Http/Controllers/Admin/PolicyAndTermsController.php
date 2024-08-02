<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\PolicyTerm;
use Illuminate\Http\Request;
use App\Models\PolicyAndTerm;
use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Models\Language;


class PolicyAndTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PolicyAndTerm::all();
        //return  view('content.policy_and_terms.index' , compact('decode' , 'disclaimer' , 'tab'));
        return  view('content.policy_and_terms.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        PolicyAndTerm::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'New privacy policy and terms section has been created.');
    
        // if($request->has('privacy')){
        //     $request->validate([
        //         'policy_text' => 'required',
        //         'privacy' => 'required'
        //     ]);
        // }else{
        //     $request->validate([
        //         'disclaimer_text' => 'required',
        //         'disclaimer' => 'required'
        //     ]);
        // }
      
        // if($request->has('privacy')){
        //     $data =[];
        //     $titles = $request->policy_title;
        //     $descriptions  = $request->policy_text;

        //     for($i=0; $i<count($titles); $i++){

        //         $pair =[
        //             "title" => $titles[$i],
        //             "description" => $descriptions[$i]
        //         ];
        //             // Add the pair to the data array
        //     $data[] = $pair;
        //     }

        //     $setting = Setting::firstorCreate(['name'=>$request->privacy]);
        //     $setting->description = json_encode($data);

        // }else{

        //     $setting = Setting::firstorCreate(['name'=>$request->disclaimer]);
        //     $setting->description = $request->disclaimer_text;

        // }
        // if($setting->save()){
        //     return redirect()->route('policy_and_terms.index')->with('success' , 'Policy has been Updated successfully');
        // }else{
        //     return redirect()->route('policy_and_terms.index')->with('error' , 'Failed to Updated Policy');

        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $policy = PolicyAndTerm::find($id);
         if($policy->delete($policy->id)){
            return redirect()->back();
         }
    }

    public function saveFileds(Request $request){
        $request->validate([
            'privacy_policy' => 'required',
            // 'disclaimer' => 'required',
        ]);
// dd($request->privacy_policy);
        $check = PolicyAndTerm::find($request->id);
        $check->privacy_policy = $request->privacy_policy;
        // $check->disclaimer = $request->disclaimer;
        if($check->save()){
            return back()->with('success' , 'Privacy Policy and term updated successfully.')->withInput(['tab' => $request->tab]);
        }else{
            return back()->with('success' , ' Failed to update Privacy Policy and term.')->withInput(['tab' => $request->tab]);
        }
    }
}