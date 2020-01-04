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

Route::Resource('user-dashboard','UserDashboardController');

///Route::Resource('super-admin','SuperAdmin');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['middleware' => ['auth', 'super-admin']], function() {

   Route::Resource('super-admin','SuperAdmin');

});

Route::group(['middleware' => ['auth', 'uddokta']], function() {

    Route::Resource('uddokta-dashboard','UddoktaDasboardController');

});


