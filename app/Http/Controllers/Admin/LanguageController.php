<?php

namespace App\Http\Controllers\Admin;

use App\Models\Text;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LanguageData;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $languages = Language::all();
    $languageData = LanguageData::all();

    $textCounts = Text::count();

    foreach ($languages as $language) {
      $language->texts_count = $textCounts;
    }
    return view('content.language.index', compact('languages', 'languageData'));
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

    $language = new Language();
    $language->title = $request->title;
    $language->status = $request->status;

    if ($request->has('icon')) {
      $image_path = $request->file('icon')->store('/images/language/icon', 'public');
      $language->icon = $image_path;
    }
    if ($language->save()) {
      return redirect()
        ->route('language.index')
        ->with('success', 'Your language has been created successfully.');
    } else {
      return redirect()
        ->route('language.index')
        ->with('error', 'Your language has not  been created successfully.');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Language  $language
   * @return \Illuminate\Http\Response
   */
  public function show(Language $language)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Language  $language
   * @return \Illuminate\Http\Response
   */
  public function edit(Language $language)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Language  $language
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $language = Language::find($id);
    $language->icon = $request->icon;
    $language->title = $request->title;
    $language->status = $request->status;
    if ($language->update()) {
      return redirect()
        ->route('language.index')
        ->with('success', 'Your language has been updated successfully.');
    } else {
      return redirect()
        ->route('language.index')
        ->with('error', 'Your language has not  been updated.');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Language  $language
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $language = Language::find($id);
  
      if (!$language) {
          return response()->json([
              'success' => false,
              'message' => 'Language not found.'
          ], 404);
      }
  
      try {
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
