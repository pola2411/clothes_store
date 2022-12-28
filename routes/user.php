<?php

use App\Http\Controllers\view\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/product/show/{id}',[IndexController::class,'showprod'])->name('show.prod');

Route::post('/addtocard',[IndexController::class,'addtocard'])->name('prod.addtocard');
Route::get('/order_create',[IndexController::class,'order_create'])->name('order_create');
Route::put('/order_edit',[IndexController::class,'update_card'])->name('update.card');
Route::get('/index_card',[IndexController::class,'index_card'])->name('index_card');
Route::delete('/delete_from_card',[IndexController::class,'delete_from_card'])->name('delete_from_card');
