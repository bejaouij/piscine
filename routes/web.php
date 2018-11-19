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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< Updated upstream
=======
Route::get('/profile', 'Auth\ProfileController@index')->name('profile_form');
Route::post('/profile', 'Auth\ProfileController@update')->name('profile_update');
>>>>>>> Stashed changes
