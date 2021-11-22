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

use Illuminate\Http\Request;

Route::get('/', 'FrontController\\HomeController@homepage')->name('homepage');
Route::get('/product/{product}', 'FrontController\\ProductController@show')->name('front.product.show');
Route::get('/product/category/{category}', 'FrontController\\ProductController@byCategory')->name('front.product.by.category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', function(){
    return view('admin.login');
});
