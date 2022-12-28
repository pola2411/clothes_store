<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[AdminController::class,'index'])->name('dashboard');

Route::get('/settings',[SettingController::class,'index'])->name('setting.index');
Route::put('/setting/{setting}/update',[SettingController::class,'update'])->name('setting.update');
Route::delete('/categores/delete',[CategoryController::class,'delete'])->name('category.delete');


 Route::get('/categores/ajar',[CategoryController::class,'getall'])->name('category.getall');

Route::resource('/categores',CategoryController::class)->except('destroy','create','show');
Route::get('/product/ajax',[ProductController::class,'getall'])->name('product.getall');
Route::delete('/product/delete',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/prodimage/{id}',[ProductController::class,'deleteimage'])->name("delete.images");
Route::resource('/product',ProductController::class)->except('show','destroy');
Route::resource('/orders',OrderController::class);
Route::get('/getyajra_orders',[OrderController::class,'getyajra'])->name('order.ajax');
