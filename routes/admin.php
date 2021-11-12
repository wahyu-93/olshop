<?php 

Route::get('/home', function(){
    return view('admin.index');
})->name('admin.index');