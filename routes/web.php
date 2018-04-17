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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit','HomeController@edit');
Route::post('/home/edit','HomeController@update');


//Dashbaord route
Route::get('/admin/users', 'UsersController@index' ); //Users manager route
Route::post('/admin/users','UsersController@approve');

Route::get('/admin', 'DashbaordController@index')->middleware('auth','admin');


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
Route::get('/categories','CategoriesController@index');


Route::get('/categories/add' ,'CategoriesController@AddView' );		  //Add button
Route::post('/categories/add','CategoriesController@Add');			  //Submit the Add


Route::get('/categories/edit/{id}' ,'CategoriesController@edit'); //Edit button
Route::post('/categories/edit/{id}','CategoriesController@submit');	 //Submit Edition

Route::get('/categories/delete/{id}','CategoriesController@destroy'); //Delete

//search
Route::get('/search','SearchController@search');

//Cart
Route::get('/cart' ,'CartsController@ShowCart');
Route::post('/cart' ,'CartsController@UpdateCart');
Route::get('/cart/delete/{id}','CartsController@RemoveItem'); //Delete
