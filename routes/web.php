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
Route::get('/home/edit','HomeController@edit');
Route::post('/home/edit','HomeController@update');

//Dashbaord route
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/users', 'UsersController@GetUsers' ); //Users manager route
//Category Controller
Route::get('/categories','CategoriesController@index');
Route::post('/categories/add','CategoriesController@Add');
Route::get('/categories/add' ,'CategoriesController@AddView' );
Route::get('/categories','CategoriesController@GetCategories');
Route::get('/categories/add','CategoriesController@GetParent');
