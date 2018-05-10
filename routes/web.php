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
Route::get('/', 'HomeController@index');


Auth::routes();
Route::get('/confirm/{id}/{token}','Auth\RegisterController@confirm');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit','HomeController@edit');
Route::post('/home/edit','HomeController@update');


//Dashbaord route
Route::get('/admin/users', 'UsersController@index' ); //Users manager route
Route::post('/admin/users','UsersController@approve');

Route::get('/admin', 'DashbaordController@index');

//eprooducts route
Route::get('/admin/products/add','ProductController@add');
Route::post('/admin/products/add','ProductController@add');


Route::get('/admin/products','ProductController@index');
Route::post('/admin/products','ProductController@delete');


Route::get('/admin/products/{id?}/edit','ProductController@show');
Route::post('/admin/products/update','ProductController@update');

Route::get('/home/{id?}','ProductDetailsController@index');
Route::post('/home/{id?}','ProductDetailsController@addItemToCart');

Route::resource('resource', 'ProductController');
//Category Controller
Route::get('/admin/categories','CategoriesController@index');


Route::get('/admin/categories/add' ,'CategoriesController@AddView' );		  //Add button
Route::post('/admin/categories/add','CategoriesController@Add');			  //Submit the Add


Route::get('/admin/categories/edit/{id}' ,'CategoriesController@edit'); //Edit button
Route::post('/admin/categories/edit/{id}','CategoriesController@submit');	 //Submit Edition

Route::get('/admin/categories/delete/{id}','CategoriesController@destroy'); //Delete

//search
Route::get('/search','SearchController@search');

//Cart
Route::get('/cart' ,'CartsController@ShowCart');
Route::post('/cart' ,'CartsController@UpdateCart');
Route::get('/cart/delete/{id}','CartsController@RemoveItem'); //Delete


//Facture
Route::get('/facture/{code}','PDFController@show');
Route::get('/admin/facture/{code}','PDFController@index');
// add route to verify facture, later change ID to HASHCODE
//Checkout
Route::post('/checkout', 'OrdersController@checkout');
Route::get('/orders', 'OrdersController@OrdersList');
Route::get('/orders/{id}', 'OrdersController@index');
Route::get('/admin/orders', 'OrdersController@AdminPanel')->middleware('auth','admin');


//orders validation , preparation , hash code checking 
Route::post('/admin/orders/{id}/validate','OrdersController@validateOrder');
Route::post('/admin/orders/{id}/refuse','OrdersController@refuseOrder');
Route::get('/admin/preparation','OrdersController@confirm')->middleware('auth','prep');
Route::post('/admin/preparation/{id}/confirm','OrdersController@confirm')->middleware('auth','prep');
Route::get('/admin/check','OrdersController@check')->middleware('auth','prep');
Route::post('/admin/check/{code}','OrdersController@check')->middleware('auth','prep');

//email
Route::get('/notification','OrdersController@notifyOnDone');

//settings
Route::get('/admin/settings', 'SettingsController@index');
Route::post('/admin/settings/editText', 'SettingsController@editText');
Route::post('/admin/settings/editVisual', 'SettingsController@editVisual');
Route::get('/admin/settings/export', 'SettingsController@export');
Route::post('/admin/settings/import', 'SettingsController@import');
