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

Route::get('/', 'FrontController\\HomeController@homepage')->name('homepage');
Route::get('/product/{product}', 'FrontController\\ProductController@show')->name('front.product.show');
Route::get('/product/category/{category}', 'FrontController\\ProductController@byCategory')->name('front.product.by.category');

Route::middleware('auth')->group(function(){
    Route::get('/cart/{product}', 'FrontController\\CartController@addItem')->name('cart.add.item');
    Route::get('/cart', 'FrontController\\CartController@index')->name('cart.index');
    Route::get('/checkout', 'FrontController\\CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'FrontController\\CheckoutController@store')->name('checkout.store');
    Route::get('/order/history', 'FrontController\\OrderController@index')->name('order.history.index');
    Route::get('/order/{order}', 'FrontController\\OrderController@show')->name('order.show');
    Route::get('/order/konfirmasi/{order}', 'FrontController\\OrderController@konfirmasi')->name('order.konfirmasi');
    Route::post('/order/konfirmasi/{order}', 'FrontController\\OrderController@konfirmasiPost')->name('order.konfirmasi.post');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', function(){
    return view('admin.login');
});
