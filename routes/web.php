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


use App\Http\Middleware\LocaleMiddleware as Locale;
Route::group(['prefix'=>Locale::getLocale()], function(){

	Auth::routes();


	Route::group([
				'prefix'=>'admin',
				'namespace'=>'Admin',
				'middleware'=>['auth', 'role:admin']
				],
				function(){
		Route::get('/', 'AdminController@dashboard');
		Route::resource('/users', 'UserController');
		Route::get('/allusers', 'UserController@userData')->name('allusers');
		Route::resource('/category', 'CategoryController');
		Route::get('/allCategory', 'CategoryController@categoryData')->name('allCategory');
		Route::resource('/products', 'ProductController');
		Route::get('/allProducts', 'ProductController@productData')->name('allProducts');
		Route::resource('/kartridjes', 'KartridjesController');
		Route::get('/allKartridjes', 'KartridjesController@kartridjesData')->name('allKartridjes');
		Route::resource('/kartridjesmodels', 'KartridjesModelsController');
		Route::get('/allKartridjesModels', 'KartridjesModelsController@kartridjesModelsData')->name('allKartridjesModels');
		Route::resource('/masters', 'MastersController');
		Route::get('/allMasters', 'MastersController@mastersData')->name('allMasters');
		Route::resource('/actskartridjes', 'ActsKartridjesController');
		Route::get('/allActsKartridjes', 'ActsKartridjesController@actsKartridjesData')->name('allActsKartridjes');
		Route::get('/showPdf/{id}', 'ActsKartridjesController@show_pdf')->name('showPdf');
		Route::resource('/actstehnikas', 'ActsTehnikasController');
		Route::get('/allActsTehnikas', 'ActsTehnikasController@actsTehnikasData')->name('allActsTehnikas');
		Route::resource('/kurier', 'KurierController');
		Route::get('/allKuriers', 'KurierController@kuriersData')->name('allKuriers');
		Route::resource('/specs', 'SpecController');
		Route::get('/allSpecs', 'SpecController@specsData')->name('allSpecs');
	});

});

Route::get('/lang/{lang}', function($lang){
	$referer=Redirect::back()->getTargetUrl();
	$referer=parse_url($referer, PHP_URL_PATH);
	$referer=explode('/', $referer);
	if(in_array($referer[1], Locale::$langs)){
		unset($referer[1]);
	}
	if($lang!=Locale::$mainLang){
		array_splice($referer, 1, 0, $lang); 
	}
	return redirect(implode('/', $referer));
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
Route::resource('/', 'GuestController');
Route::resource('/magazin', 'MagazinController');
Route::get('/magazin/{magazin}', 'MagazinController@show');
Route::get('/magazin/magazin/{magazin}', 'MagazinController@showProduct');
Route::post('/add-to-cart', 'MagazinController@addToCart');
Route::post('/clear-cart', 'MagazinController@clearCart');
Route::post('/remove-from-cart', 'MagazinController@removeFromCart');
Route::get('/checkout', 'MagazinController@checkout');
Route::post('/checkout-end', 'MagazinController@checkoutEnd');
Route::resource('/kartridj', 'GuestKartridjController');
Route::get('/wotsap', 'GuestKartridjController@wotsap');
Route::match(['get', 'post'], '/proveritKartridji', 'GuestKartridjController@proveritKartridji');
Route::match(['get', 'post'], '/kurier', 'GuestKartridjController@kurier');
Route::match(['get', 'post'], '/kurierVizov', 'GuestKartridjController@kurierVizov');
Route::resource('/vizov', 'VizovController');
Route::match(['get', 'post'], '/spec', 'VizovController@spec');
Route::match(['get', 'post'], '/specVizov', 'VizovController@specVizov');