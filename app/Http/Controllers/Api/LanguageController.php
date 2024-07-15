<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LanguageData;
use App\Models\Text;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $languages = Language::all();
            $languageData = LanguageData::all();
    
            $textCounts = Text::count();
    
            foreach ($languages as $language) {
                $language->texts_count = $textCounts;
            }
    
            return response()->json([
                'success' => true,
                'languages' => $languages,
                'languageData' => $languageData,
                'texts_count' => $textCounts
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch languages and language data.',
                'error' => $e->getMessage()
            ], 500);
        }
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
            'icon' => 'required',
            'title' => 'required',
        ]);
    
        try {
            $language = new Language();
            $language->title = $request->title;
            $language->status = $request->status;
    
            if ($request->hasFile('icon')) {
                $image_path = $request->file('icon')->store('/images/language/icon', 'public');
                $language->icon = $image_path;
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Icon file is required.'
                ], 400);
            }
    
            if ($language->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your language has been created successfully.',
                    'language' => $language
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create language.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create language.',
                'error' => $e->getMessage()
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
        $language = Language::find($id);
    
        if (!$language) {
            return response()->json([
                'success' => false,
                'message' => 'Language not found.'
            ], 404);
        }
    
        $language->icon = $request->icon;
        $language->title = $request->title;
        $language->status = $request->status;
    
        try {
            if ($language->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your language has been updated successfully.',
                    'language' => $language
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update language.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update language.',
                'error' => $e->getMessage()
            ], 500);
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
        try {
            $language = Language::find($id);
    
            if (!$language) {
                return response()->json([
                    'success' => false,
                    'message' => 'Language not found.'
                ], 404);
            }
    
            if ($language->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your language has been deleted successfully.'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete language.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete language.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
