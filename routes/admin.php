<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[AdminController::class,'index'])->name('dashboard');

Route::get('/settings',[SettingController::class,'index'])->name('setting.index');
Route::put('/setting/{setting}/update',[SettingController::class,'update'])->name('setting.update');


