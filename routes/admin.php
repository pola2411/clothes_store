<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[AdminController::class,'index'])->name('dashboard');

Route::get('/settings',[SettingController::class,'index'])->name('setting.index');
Route::put('/setting/{setting}/update',[SettingController::class,'update'])->name('setting.update');
Route::delete('/categores/delete',[CategoryController::class,'delete'])->name('category.delete');


 Route::get('/categores/ajar',[CategoryController::class,'getall'])->name('category.getall');

Route::resource('/categores',CategoryController::class)->except('destroy','create','show');



