<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\PolicyAndTermsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('countries',[CountryController::class,'index'])->name('countries.index');
Route::post('countries',[CountryController::class,'store'])->name('countries.store');
Route::put('countries/{id}',[CountryController::class,'update'])->name('countries.update');
Route::delete('countries/{id}',[CountryController::class,'destroy'])->name('countries.destroy');

Route::get('policy_and_terms',[PolicyAndTermsController::class,'index'])->name('policy_and_terms.index');
Route::post('policy_and_terms',[PolicyAndTermsController::class,'store'])->name('policy_and_terms.store');
Route::post('policy_and_terms/saveFileds', [PolicyAndTermsController::class, 'saveFileds'])->name('policy_and_terms.saveFileds');
Route::delete('policy_and_terms/{id}',[PolicyAndTermsController::class,'destroy'])->name('policy_and_terms.destroy');

Route::get('languages',[LanguageController::class,'index'])->name('languages.index');
Route::post('languages',[LanguageController::class,'store'])->name('languages.store');
Route::post('languages/{id}',[LanguageController::class,'update'])->name('languages.update');
Route::delete('languages/{id}',[LanguageController::class,'destroy'])->name('languages.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


