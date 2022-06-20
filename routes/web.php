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
Route::get('home', 'App\Http\Controllers\RedirectController@index');
Route::get('profile', 'App\Http\Controllers\RedirectController@profile');
Route::get('search', 'App\Http\Controllers\RedirectController@search');
Route::get('create', 'App\Http\Controllers\RedirectController@create');
Route::get('feedback', 'App\Http\Controllers\RedirectController@feedback');

Route::post('signup', 'App\Http\Controllers\LandingController@do_signup');
Route::post('login', 'App\Http\Controllers\LandingController@do_login');
Route::get('check/user/{q}','App\Http\Controllers\LandingController@user_check');
Route::get('check/email/{q}','App\Http\Controllers\LandingController@email_check');

Route::get('logout', 'App\Http\Controllers\LandingController@logout');

Route::get('fetch/{type?}', 'App\Http\Controllers\FetchController@fetch');
Route::get('fetch/{type}/{query}', 'App\Http\Controllers\FetchController@fetch');

Route::get('api/search/{q?}', 'App\Http\Controllers\TenorController@gif_search');

Route::get('post/delete/{id}', 'App\Http\Controllers\PostController@delete');
Route::post('post/create', 'App\Http\Controllers\PostController@create');

Route::post('feedback/send', 'App\Http\Controllers\FeedbackController@send_feedback');