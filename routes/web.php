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

Route::get('/home/index2','HomeController@index2');
Route::get('/terms','HomeController@TermsAndConditions');
Route::get('/about','HomeController@About');


//Comments
Route::post('/home/{product}/comments','CommentsController@addComment');
Route::get('/home/{comment}/delete','CommentsController@removeComment');
Route::post('/home/{comment}/update','CommentsController@updateComment');
Route::post('/home/{product}/rate','RateController@create');
Route::post('/home/{product}/checkrate','RateController@index');
//Dashbaord route
Route::get('/admin/users', 'UsersController@index' ); //Users manager route
Route::post('/admin/users','UsersController@save');

Route::get('/admin', 'DashbaordController@index');

//eprooducts route
Route::get('/admin/products/add','ProductController@add');
Route::post('/admin/products/add','ProductController@add');


Route::get('/admin/products','ProductController@index');
Route::post('/admin/products','ProductController@delete');


Route::get('/admin/products/{id?}/edit','ProductController@show');
Route::post('/admin/products/update','ProductController@update');

Route::get('/home/{id?}','ProductDetailsController@index');
Route::post('/home/{id?}','ProductDetailsController@addItemToCart')->middleware('auth');

Route::resource('resource', 'ProductController');
//Category Controller
Route::get('/admin/categories','CategoriesController@index');


Route::get('/admin/categories/add' ,'CategoriesController@AddView' );		  //Add button
Route::post('/admin/categories/add','CategoriesController@Add');			  //Submit the Add


Route::get('/admin/categories/edit/{id}' ,'CategoriesController@edit'); //Edit button
Route::post('/admin/categories/edit/{id}','CategoriesController@submit');	 //Submit Edition

Route::get('/admin/categories/delete/{id}','CategoriesController@destroy'); //Delete

Route::post('/admin/users/AddPrepa','DashbaordController@AddPrepa'); //Ajouter preparateur

//search
Route::get('/search','SearchController@search');

//Cart
Route::get('/cart' ,'CartsController@ShowCart');
Route::post('/cart' ,'CartsController@UpdateCart');
Route::get('/cart/delete/{id}','CartsController@RemoveItem'); //Delete


//Facture
Route::get('/facture/{code}','PDFController@show');
// add route to verify facture, later change ID to HASHCODE
//Checkout
Route::post('/checkout', 'OrdersController@checkout');
Route::get('/orders', 'OrdersController@OrdersList');
Route::get('/orders/{id}', 'OrdersController@index');
Route::get('/admin/orders', 'OrdersController@AdminPanel')->middleware('auth','admin');


//orders validation , preparation , hash code checking
Route::post('/admin/orders/{id}/validate','OrdersController@validateOrder');
Route::post('/admin/orders/{id}/refuse','OrdersController@refuseOrder');

Route::get('/admin/preparation','OrdersController@confirm')->middleware('auth');
Route::post('/admin/preparation/{id}/confirm','OrdersController@confirm')->middleware('auth');
Route::get('/admin/check','OrdersController@check')->middleware('auth');
Route::post('/admin/check/{code}','OrdersController@check')->middleware('auth');
Route::post('/admin/orders/{id}/retrieve','OrdersController@retrieve');
//android app
Route::post('/admin/preparationapp/{id}/confirm','ConfirmationAppController@confirmApp');
Route::get('/admin/preparationapp','ConfirmationAppController@confirmApp');
Route::post('/admin/preparationapp/{id}/retrieve','ConfirmationAppController@retrieve');

//orders missing products
Route::post('/admin/orders/{id}/ask','OrdersController@missingProduct');
Route::post('/orders/{code}/get','OrdersController@getMissingproducts');
Route::post('/orders/{code}/confirm','OrdersController@missingProductConfirm');
Route::post('/orders/{code}/backtocart','OrdersController@backToCart');
Route::post('/orders/{code}/msdelete','OrdersController@missingProductOrderDelete');
Route::post('/orders/{id}/delete','OrdersController@deleteOrder');
//email
Route::get('/notification','OrdersController@notifyOnDone');
// get notifications
Route::get('/getnotifications','NotificationsController@index');
Route::get('/showmore','NotificationsController@showMore');
//settings
Route::get('/admin/settings', 'SettingsController@index');
Route::post('/admin/settings/editText', 'SettingsController@editText');
Route::post('/admin/settings/editVisual', 'SettingsController@editVisual');
Route::get('/admin/settings/export', 'SettingsController@export');
Route::post('/admin/settings/import', 'SettingsController@import');


//contact us
Route::get('/contactus','HomeController@contactus');
Route::post('/contactus','contactUsMailController@sendMail');






//error
Route::get('/error',function ()
{
	return view('error');
});
