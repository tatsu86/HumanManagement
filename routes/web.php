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

Route::get('friend', 'friendController@index')->name('frined.index');
Route::post('friend', 'friendController@store')->name('friend.store');
Route::get('friend/create', 'friendController@create')->name('friend.create');
Route::put('friend/{id}', 'friendController@update')->name('friend.update');
Route::delete('friend/{id}', 'friendController@destroy')->name('friend.destroy');
Route::get('friend/{id}/edit', 'friendController@edit')->name('friend.edit');
Route::get('friend/{id}', 'friendController@show')->name('friend.show');


Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/', 'HomeController@index')->name('home');
