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

Route::get('/hello', function () {
    return view('helloWorld');
})->name("Hello");

Route::get('/page/{param?}', function ($param = null) {
    return view('page', ['param' => $param]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wall', 'WallController@index')->name('wallIndex')->middleware('auth');
Route::get('/wall/delete/{id_message}', 'WallController@delete')->name('wallDelete')->middleware('auth');
Route::post('/wall/write', 'WallController@write')->name('wallWrite');
