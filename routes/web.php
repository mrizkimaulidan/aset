<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\CommodityCategoryController;
use App\Http\Controllers\Administrator\CommodityLocationController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::name('admin.')->group(function () {
    Route::resource('/pengguna', UserController::class);
    Route::resource('/jenis-aset', CommodityCategoryController::class);
    Route::resource('/ruangan', CommodityLocationController::class);

    Route::get('/jenis-aset/json/{id}', [App\Http\Controllers\Administrator\Json\CommodityCategoryController::class, 'show']);
    Route::get('/ruangan/json/{id}', [App\Http\Controllers\Administrator\Json\CommodityLocationController::class, 'show']);
});
