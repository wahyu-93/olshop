<?php 

Route::get('/home', function(){
    return view('admin.index');
})->name('admin.index');

Route::resource('/category', 'CategoryController');
Route::resource('/product', 'ProductController');

Route::get('/order','OrderController@index')->name('admin.order');
Route::get('/order/{order}','OrderController@detail')->name('admin.order.detail');
Route::get('/konfirmasi/{order}', 'OrderController@konfirmasi')->name('admin.konfirm');
Route::post('/konfirmasi/{order}/ok', 'OrderController@konfirmasiOk')->name('admin.konfirm.ok');
Route::post('/konfirmasi/{order}/cancel', 'OrderController@konfirmasiCancel')->name('admin.konfirm.cancel');