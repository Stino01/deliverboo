<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//CONTROLLER PER VISUALIZZARE LE TIPOLOGIE E I RISTORANTI IN HOME
Route::get('/types', 'Api\HomeController@index');
Route::get('/restaurants', 'Api\HomeController@index');

//CONTROLLER PER VISUALIZZARE IL SINGOLO RISTORANTE
Route::get("/restaurants/{slug}", "Api\HomeController@show");
