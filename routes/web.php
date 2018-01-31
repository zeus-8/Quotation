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

//Route::pattern('bill', '[0-9]+');

Route::post('prueba', [
			'uses' => 'QuotationCeroController@metodoprueba',
			'as' => 'prueba.metodoprueba'
		]);
Route::post('locali', [
			'uses' => 'QuotationCeroController@localidad',
			'as' => 'locali.localidad'
		]);
Route::post('noches', 'QuotationCeroController@noche');
Route::post('probando', 'QuotationCeroController@probando');
Route::post('hoteles', 'QuotationCeroController@hoteles');
Route::post('localidadpa', 'PackagesController@localidad');

Route::post('hotels_test', 'QuotationCeroController@test_gust');

Route::resources([
	'usuario' => 'UserController',
	'bed' => 'BedroomController',
	'hotel' => 'HostelController',
	'location' => 'LocationController',
	'transport' => 'TransportController',
	'packages' => 'PackagesController',
	'quotation'=> 'QuotationController',
	'quotationC' => 'QuotationCeroController',
	'guide'	=>	'GuideController',
	'company' => 'CompanyController',
	'restaurant' => 'RestaurantController',
	'bill'	=> 'BillController',
	'customer'	=>	'CustomerController',
	'reference' => 'ReferenceController',
	'communication' => 'ComunicationController'
]);
Route::get('usuario/{id}/destroy', [
			'uses'	=>	'UserController@destroy',
			'as'	=>	'usuario.destroy'
		]);
Route::get('bed/{id}/destroy', [
			'uses'	=>	'BedroomController@destroy',
			'as'	=>	'bed.destroy'
		]);
Route::get('hotel/{id}/destroy', [
			'uses'	=>	'HostelController@destroy',
			'as'	=>	'hotel.destroy'
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
Route::get('restaurant/{id}/destroy', [
			'uses'	=>	'RestaurantController@destroy',
			'as'	=>	'restaurant.destroy'
		]);
Route::get('customer/{id}/destroy', [
			'uses'	=>	'CustomerController@destroy',
			'as'	=>	'customer.destroy'
		]);
Route::get('reference/{id}/destroy', [
			'uses'	=>	'ReferenceController@destroy',
			'as'	=>	'reference.destroy'
		]);
