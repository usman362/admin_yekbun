<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use App\Models\AppInfo;


class PayPalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paypal = Paypal::orderBy('id' , 'desc')->get();
<<<<<<< HEAD
           $appinfo = AppInfo::first();
=======
          $appinfo = AppInfo::first();
>>>>>>> fba7d18c3ec908613b3cd6be7368ef691583fcd7
        return view('content.paypaltransfer.index' , compact('paypal','appinfo'));
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
            'paypal_cleint_id' => 'required',
            'paypal_cleint_secret' => 'required',
        ]);

        $bank  = new Paypal();
        $bank->add_title = $request->add_title;
        $bank->paypal_cleint_id = $request->paypal_cleint_id;
        $bank->paypal_cleint_secret = $request->paypal_cleint_secret;
       

        if($bank->save()){
            return redirect()->route('settings.paypal.index')->with('success' , 'Paypal Created Successfully.');
        }else{
            return redirect()->route('settings.paypal.index')->with('success' , 'Failed to Create Paypal.');
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
        $bank = Paypal::find($id);
        $bank->add_title = $request->add_title;
        $bank->paypal_cleint_id = $request->paypal_cleint_id;
        $bank->paypal_cleint_secret = $request->paypal_cleint_secret ;
       
        if($bank->update()){
            return redirect()->route('settings.paypal.index')->with('success'  , 'Paypal Account updated successfully');
        }else{
            return redirect()->route('settings.paypal.index')->with('error' , 'Failed to update Paypal account.');
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
        $bank = Paypal::find($id);
        if($bank->delete($bank->id)){
            return redirect()->route('settings.paypal.index')->with('success' , 'Account has been deleted successfully.');
        }else{
            return redirect()->route('settings.paypal.index')->with('error' , 'Failed to delete account.');
        }
    }
}
