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

// Route::get('/', function () {
//     return view('home');
// });

// Route::resource('friend', 'friendController');

Route::group(['middleware' => 'auth'], function() {
    Route::get('friend', 'friendController@index')->name('friend.index');
    Route::post('friend', 'friendController@store')->name('friend.store');
    Route::get('friend/create', 'friendController@create')->name('friend.create');
    Route::put('friend/{id}', 'friendController@update')->name('friend.update');
    Route::delete('friend/{id}', 'friendController@destroy')->name('friend.destroy');
    Route::get('friend/{id}/edit', 'friendController@edit')->name('friend.edit');
    Route::get('friend/{id}', 'friendController@show')->name('friend.show');

    // Route::get('friendContact/index/{frined_id}', 'friend@index')->name('friendContact.index');
    Route::get('friend/{friend_id}/create', 'FriendContactController@create')->name('friendContact.create');
    Route::post('friendContact/{friend_id}', 'FriendContactController@store')->name('friendContact.store');
});


Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/', 'HomeController@index')->name('home');
