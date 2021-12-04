<?php 

Route::get('/home', function(){
    return view('admin.index');
})->name('admin.index');

Route::resource('/category', 'CategoryController');
Route::resource('/product', 'ProductController');

Route::get('/order','OrderController@index')->name('admin.order');