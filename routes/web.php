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


Route::group(['middleware' => 'auth'], function() {
    // フレンド
    Route::get('friend', 'FriendController@index')->name('friend.index');
    Route::get('friend/create', 'FriendController@create')->name('friend.create');
    Route::post('friend', 'FriendController@store')->name('friend.store');
    Route::put('friend/{id}', 'FriendController@update')->name('friend.update');
    Route::delete('friend/{id}', 'FriendController@destroy')->name('friend.destroy');
    Route::get('friend/{id}/edit', 'FriendController@edit')->name('friend.edit');
    Route::get('friend/{id}', 'FriendController@show')->name('friend.show');
    // コンタクト
    Route::get('friendContact', 'FriendContactController@index')->name('friendContact.index');
    Route::get('friendContact/{friend_id}/{redirect_type}/create', 'FriendContactController@create')->name('friendContact.create');
    Route::post('friendContact', 'FriendContactController@store')->name('friendContact.store');
    Route::get('friendContact/{id}/{redirect_type}', 'FriendContactController@edit')->name('friendContact.edit');
    Route::post('friendContact/{id}', 'FriendContactController@update')->name('friendContact.update');
    Route::delete('friendContact/{id}/{redirect_type}', 'FriendContactController@destroy')->name('friendContact.destroy');
    // コンタクト分析
    Route::get('contactAnalysis', 'ContactAnalysisController@index')->name('contactAnalysis.index');
});


Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/', 'HomeController@index')->name('home');
