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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('category', 'CategoryController');
Route::resource('book', 'BookController');
Route::get('home', 'HomeController@index');
Route::get('/', 'PublicController@index');
Route::get('/detail/{id}', 'PublicController@show');

Route::get('/cart', 'CartController@cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart');

Auth::routes();


