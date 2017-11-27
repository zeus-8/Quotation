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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuario', 'UserController');
Route::get('usuario/{id}/destroy', [
			'uses'	=>	'UserController@destroy',
			'as'	=>	'usuario.destroy'
		]);

Route::resource('bed', 'BedroomController');
Route::get('bed/{id}/destroy', [
			'uses'	=>	'BedroomController@destroy',
			'as'	=>	'bed.destroy'
		]);