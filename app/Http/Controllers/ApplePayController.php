<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplePay;
use App\Models\AppInfo;


class ApplePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $applepay = ApplePay::orderBy('id' , 'desc')->get();
            $appinfo = AppInfo::first();
        return view('content.applepaytransfer.index' , compact('applepay','appinfo'));
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
            'applepay_cleint_id' => 'required',
            'applepay_cleint_secret' => 'required',
        ]);

        $bank  = new ApplePay();
        $bank->add_title = $request->add_title;
        $bank->applepay_cleint_id = $request->applepay_cleint_id;
        $bank->applepay_cleint_secret = $request->applepay_cleint_secret;
       

        if($bank->save()){
            return redirect()->route('settings.applepay.index')->with('success' , 'ApplePay Created Successfully.');
        }else{
            return redirect()->route('settings.applepay.index')->with('success' , 'Failed to Create ApplePay.');
        }
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
        $bank = ApplePay::find($id);
        $bank->add_title = $request->add_title;
        $bank->applepay_cleint_id = $request->applepay_cleint_id;
        $bank->applepay_cleint_secret = $request->applepay_cleint_secret ;
       
        if($bank->update()){
            return redirect()->route('settings.applepay.index')->with('success'  , 'Applepay Account updated successfully');
        }else{
            return redirect()->route('settings.applepay.index')->with('error' , 'Failed to update Paypal account.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = ApplePay::find($id);
        if($bank->delete($bank->id)){
            return redirect()->route('settings.applepay.index')->with('success' , 'Account has been deleted successfully.');
        }else{
            return redirect()->route('settings.applepay.index')->with('error' , 'Failed to delete account.');
        }
    }
}
