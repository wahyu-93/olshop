<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/rajaongkir/province', 'RajaOngkirController@getProvince')->name('rajaongkir.province');
Route::get('/rajaongkir/city', 'RajaOngkirController@getCity')->name('rajaongkir.city');
Route::post('/rajaongkir/cost', 'RajaOngkirController@getCost')->name('rajaongkir.cost');
