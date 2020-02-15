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


//Route::post('/account', 'AccountController@update')->name('account.update')->middleware('auth');
Route::get('account', 'AccountController@show')->middleware('auth')->name('profile.show');
Route::post('account', 'AccountController@update')->middleware('auth')->name('account.update');

Route::post('delete/{id}', 'PostController@destroy')->name('{id}')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/add-posts', 'PostController@create')->name('posts.create');




Route::group(['middleware' => 'auth'], function () {
    Route::get('/{username}/following', 'ProfileController@following')->name('following');
    Route::get('/follows/{username}', 'UserController@follows');
    Route::get('/unfollows/{username}', 'UserController@unfollows');
});
Route::get('/{username}', 'ProfileController@show')->name('profile');
Route::get('/{username}/followers', 'ProfileController@followers')->name('followers');