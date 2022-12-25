<?php

use App\Http\Controllers\view\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/home',[IndexController::class,'index'])->name('index_first');
Route::get('/product/{id}',[IndexController::class,'prod_page'] )->name('user.prod');
Route::get('/prod_yajra/{id}',[IndexController::class,'yajra_prod'])->name('prod.yajra');
Route::get('/product/show/{id}',[IndexController::class,'showprod'])->name('show.prod');
