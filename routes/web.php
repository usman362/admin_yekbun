<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\MovieController;
Route::get('/browse_movies/', [MovieController::class, 'show']);


use App\Http\Controllers\AvatarsController;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;

//Route::get('/avatars/', [AvatarsController::class, 'index']);
//Route::get('/avatars/{id}', [AvatarsController::class, 'edit']);

Route::resource('/avatars', AvatarsController::class);
Route::post('/avatars/create', [AvatarsController::class, 'store']);
Route::post('/avatars/{id}/edit', [AvatarsController::class, 'update']);
Route::get('/manage-avatars/', [AvatarsController::class, 'manag_avatars']);
Route::get('/manage-avatars/{id}', [AvatarsController::class, 'manag_avatars']);
Route::get('/get-avatars/{id}', [AvatarsController::class, 'get_avatars']);



//greetings 
Route::resource('/uploads_cards', GreetingsController::class);

Route::resource('/pricings', GreetingsController::class);

Route::get('/get-pricing/{id}', [GreetingsController::class, 'get_pricing']);

Route::prefix("wishes")->name("wishes.")->group(function () {
	Route::get('setting/pricing', [GreetingsController::class,'pricing']);
	Route::post('setting/pricing', [GreetingsController::class,'pricing']);
	
});

Route::resource('/settings/countries', CountryController::class);
Route::resource('/settings/provinces', StateController::class);

Route::post('/searchlocation', [CountryController::class, 'search_location']);

Route::get('/', function () {
    return view('welcome');
});
