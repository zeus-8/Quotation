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

Route::resources([
	'usuario' => 'UserController',
	'bed' => 'BedroomController',
	'hostel' => 'HostelController',
	'location' => 'LocationController',
	'transport' => 'TransportController',
	'packages' => 'PackagesController',
	'quotation'=> 'QuotationController',
	'quotationC' => 'QuotationCeroController',
	'guide'	=>	'GuideController',
	'company' => 'CompanyController'
]);
Route::get('usuario/{id}/destroy', [
			'uses'	=>	'UserController@destroy',
			'as'	=>	'usuario.destroy'
		]);
Route::get('bed/{id}/destroy', [
			'uses'	=>	'BedroomController@destroy',
			'as'	=>	'bed.destroy'
		]);
Route::get('hostel/{id}/destroy', [
			'uses'	=>	'HostelController@destroy',
			'as'	=>	'hostel.destroy'
		]);
Route::get('location/{id}/destroy', [
			'uses'	=>	'LocationController@destroy',
			'as'	=>	'location.destroy'
		]);
Route::get('transport/{id}/destroy', [
			'uses'	=>	'TransportController@destroy',
			'as'	=>	'transport.destroy'
		]);
Route::get('packages/{id}/destroy', [
			'uses'	=>	'PackagesController@destroy',
			'as'	=>	'packages.destroy'
		]);
Route::get('quotation/{id}/destroy', [
			'uses'	=>	'QuotationController@destroy',
			'as'	=>	'quotation.destroy'
		]);
Route::get('guide/{id}/destroy', [
			'uses'	=>	'GuideController@destroy',
			'as'	=>	'guide.destroy'
		]);
