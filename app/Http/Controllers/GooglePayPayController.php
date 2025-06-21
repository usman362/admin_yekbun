<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GooglePay;
use App\Models\AppInfo;

class GooglePayPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $googlepay = GooglePay::orderBy('id' , 'desc')->get();
          $appinfo = AppInfo::first();
        return view('content.googlepaypaytransfer.index' , compact('googlepay','appinfo'));
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
            'googlepay_cleint_id' => 'required',
            'googlepay_cleint_secret' => 'required',
        ]);

        $bank  = new GooglePay();
        $bank->add_title = $request->add_title;
        $bank->googlepay_cleint_id = $request->googlepay_cleint_id;
        $bank->googlepay_cleint_secret = $request->googlepay_cleint_secret;
       

        if($bank->save()){
            return redirect()->route('settings.googlepay.index')->with('success' , 'ApplePay Created Successfully.');
        }else{
            return redirect()->route('settings.googlepay.index')->with('success' , 'Failed to Create ApplePay.');
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
          $bank = GooglePay::find($id);
        $bank->add_title = $request->add_title;
        $bank->googlepay_cleint_id = $request->googlepay_cleint_id;
        $bank->googlepay_cleint_secret = $request->googlepay_cleint_secret ;
       
        if($bank->update()){
            return redirect()->route('settings.googlepay.index')->with('success'  , 'Applepay Account updated successfully');
        }else{
            return redirect()->route('settings.googlepay.index')->with('error' , 'Failed to update Paypal account.');
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
        $bank = GooglePay::find($id);
        if($bank->delete($bank->id)){
            return redirect()->route('settings.googlepay.index')->with('success' , 'Account has been deleted successfully.');
        }else{
            return redirect()->route('settings.googlepay.index')->with('error' , 'Failed to delete account.');
        }
    }
}
