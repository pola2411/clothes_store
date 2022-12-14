<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\view\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[IndexController::class,'index'])->name('index_first');
Route::get('/product/{id}',[IndexController::class,'prod_page'] )->name('user.prod');
Route::get('/prod_yajra/{id}',[IndexController::class,'yajra_prod'])->name('prod.yajra');



Auth::routes();

