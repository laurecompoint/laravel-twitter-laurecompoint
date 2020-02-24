<?php

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/twitter', 'PostController@index');
Route::get('/twitter-user', 'UserController@index');


Route::get('account', 'AccountController@show')->name('profile.show');
Route::post('account-update', 'AccountController@update')->middleware('auth')->name('account.update');

Route::post('compteuser', 'AccountController@destroy')->middleware('auth')->name('compte.destroyuser');

Route::post('compteuser-avatar', 'AccountController@destroyavatar')->middleware('auth')->name('compte.destroyavatar');

Route::post('delete/{id}', 'PostController@destroy')->name('{id}')->middleware('auth');

Route::post('/add-posts', 'PostController@create')->name('posts.create')->middleware('auth');

Route::post('/url-page', 'PostController@store')->name('posts.store')->middleware('auth');

Route::get('/{username}/following', 'ProfileController@following')->name('following');
Route::get('/follows/{username}', 'UserController@follows')->middleware('auth');
Route::get('/unfollows/{username}', 'UserController@unfollows')->middleware('auth');

Route::get('/{username}', 'ProfileController@show')->name('profile');
Route::get('/{username}/followers', 'ProfileController@followers')->name('followers');

