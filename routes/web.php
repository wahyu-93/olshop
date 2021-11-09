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

Route::get('/', function (Request $request) {
    // return view('admin.index');
    $user = $request->user();
    // dd($user->hasRole('admin'));
    dd($user->can('add_product','delete_product'));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
