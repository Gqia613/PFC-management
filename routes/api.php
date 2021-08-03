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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::middleware('auth:sanctum')->get('/getphysique/{user_id?}', 'App\Http\Controllers\SettingController@getPhysique');
Route::middleware('auth:sanctum')->get('/getlist/{user_id?}', 'App\Http\Controllers\ListController@getList');
Route::middleware('auth:sanctum')->get('/getlist-active/{user_id?}', 'App\Http\Controllers\ListController@getListActive');
Route::middleware('auth:sanctum')->get('/getlist-detail/{user_id?}/{physique_id?}', 'App\Http\Controllers\ListController@getListDetail');

Route::get('/calculation/{age?}/{exercise?}/{first_day?}/{goal_weight?}/{height?}/{last_day?}/{gender?}/{weight?}', 'App\Http\Controllers\TopController@calculation');


Route::post('/physique', 'App\Http\Controllers\SettingController@insPhysique');
Route::post('/result', 'App\Http\Controllers\TopController@insResult');
Route::post('/deletelist', 'App\Http\Controllers\ListController@deleteListDetail');

Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
Route::post('/register', 'App\Http\Controllers\RegisterController@register');
