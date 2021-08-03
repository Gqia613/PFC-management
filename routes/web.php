<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', 'App\Http\Controllers\TopController@home')->where('any', '^(?!.*api).+$');
Route::get('/', 'App\Http\Controllers\TopController@index');
// Route::get('/{any}', 'App\Http\Controllers\TopController@home')->where('any', '.*');
// Route::get('/{any}', 'App\Http\Controllers\TopController@home')->where('any', '^(?=.*)(?!.*api).+$');
// Route::get('/{any}', 'App\Http\Controllers\TopController@home')->where(['any' => '.*', 'any' => '^(?!.*api).+$']);
// Route::any('/home', function () {
//     return view('home');
// });
// Route::get('/home{any}', 'App\Http\Controllers\TopController@home')->where('any', '.*');
// Route::get('/home', 'App\Http\Controllers\TopController@home');
// Route::get('/home/list', 'App\Http\Controllers\TopController@home');
// Route::get('/home/list/detail', 'App\Http\Controllers\TopController@home');
// Route::get('/home/setting', 'App\Http\Controllers\TopController@home');
// Route::get('/home/setting/myphysique', 'App\Http\Controllers\TopController@home');

// Route::get('/login', 'App\Http\Controllers\TopController@index');
// Route::get('/register', 'App\Http\Controllers\TopController@index');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
