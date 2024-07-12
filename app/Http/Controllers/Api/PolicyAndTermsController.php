<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PolicyAndTerm;

class PolicyAndTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    
        try {
            $policyAndTerm = PolicyAndTerm::create([
                'name' => $request->name
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'New privacy policy and terms section has been created.',
                
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create new privacy policy and terms section.',
                'error' => $e->getMessage(),
            ], 500);
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
        try {
            $policy = PolicyAndTerm::findOrFail($id);
    
            if ($policy->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Policy and terms section has been deleted successfully.'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete policy and terms section.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Policy and terms section not found.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function saveFileds(Request $request)
{
    $request->validate([
        'privacy_policy' => 'required',
        // 'disclaimer' => 'required',
    ]);

    try {
        $check = PolicyAndTerm::findOrFail($request->id);
        $check->privacy_policy = $request->privacy_policy;
        // $check->disclaimer = $request->disclaimer;

        if ($check->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Privacy Policy and terms updated successfully.',
               
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Privacy Policy and terms.'
            ], 500);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Policy and terms not found.',
            'error' => $e->getMessage(),
        ], 404);
    }
}


}
