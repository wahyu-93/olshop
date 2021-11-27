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
Route::get('/cart/{product}', 'FrontController\\CartController@addItem')->middleware('auth')->name('cart.add.item');
Route::get('/cart', 'FrontController\\CartController@index')->middleware('auth')->name('cart.index');
Route::get('/checkout', 'FrontController\\CheckoutController@index')->middleware('auth')->name('checkout.index');

Route::get('/rajaongkir/province', 'RajaOngkirController@getProvince')->middleware('auth')->name('rajaongkir.province');
Route::get('/rajaongkir/city', 'RajaOngkirController@getCity')->middleware('auth')->name('rajaongkir.city');
Route::get('/rajaongkir/cost', 'RajaOngkirController@getCost')->middleware('auth')->name('rajaongkir.cost');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', function(){
    return view('admin.login');
});
