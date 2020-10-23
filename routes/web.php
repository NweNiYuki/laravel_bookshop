
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

// Route::resource('/cart', 'CcartController');
// Route::get('add-to-cart/{id}', 'CartController@addToCart');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store');
Route::post('/cart/update','CartController@updatecart')->name('cart.update');
Route::get('/cart/remove/{rowId}', 'CartController@removeCart')->name('cart.remove');


Route::get('/order','CustomerOrderController@order')->name('customer.order');

// Route::get('/cart/empty', function() {
// 	Cart::destroy();
// });


// Route::get('/checkout','CheckoutController@index');
// Route::post('/checkout', 'CheckoutController@store');

Route::resource('/checkout', 'CheckoutController');
Route::get('/thank', function() {

	return view('publicviews.thank');
});

Auth::routes();


