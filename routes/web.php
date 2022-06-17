<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('landing');
});

Route::get('landing', 'App\Http\Controllers\LandingController@landing_home');

Route::post('signup', 'App\Http\Controllers\LandingController@do_signup');
Route::post('login', 'App\Http\Controllers\LandingController@do_login');