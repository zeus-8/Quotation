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

Route::resource('hostel', 'HostelController');
Route::get('hostel/{id}/destroy', [
			'uses'	=>	'HostelController@destroy',
			'as'	=>	'hostel.destroy'
		]);

Route::resource('location', 'LocationController');
Route::get('location/{id}/destroy', [
			'uses'	=>	'LocationController@destroy',
			'as'	=>	'location.destroy'
		]);

Route::resource('transport', 'TransportController');
Route::get('transport/{id}/destroy', [
			'uses'	=>	'TransportController@destroy',
			'as'	=>	'transport.destroy'
		]);
Route::resource('packages', 'PackagesController');
Route::get('packages/{id}/destroy', [
			'uses'	=>	'PackagesController@destroy',
			'as'	=>	'packages.destroy'
		]);
Route::resource('quotation', 'QuotationController');
Route::get('quotation/{id}/destroy', [
			'uses'	=>	'QuotationController@destroy',
			'as'	=>	'quotation.destroy'
		]);