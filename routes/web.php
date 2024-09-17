<?php

use Illuminate\Support\Facades\Route;
#for normal user(audion)
Route::get('/', function () {
    return view('home');
});
#for admin post article
Route::get('/Admin',function(){
    return view('welcome');
});