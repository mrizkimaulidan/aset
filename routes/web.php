<?php

use App\Http\Controllers\AdministrativeStaff\CommodityUpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\CommodityCategoryController;
use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\CommodityLocationController;
use App\Http\Controllers\Administrator\PrintController;
use App\Http\Controllers\Administrator\ReportController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
})->middleware(['redirect.if.login.true']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::resource('/pengguna', UserController::class)->except('create', 'show');
        Route::resource('/jenis-aset', CommodityCategoryController::class)->except('create', 'show', 'edit');
        Route::resource('/ruangan', CommodityLocationController::class)->except('create', 'show', 'edit');
        Route::resource('/aset', CommodityController::class)->except('create', 'show');

        Route::get('/jenis-aset/json/{id}', [App\Http\Controllers\Administrator\Json\CommodityCategoryController::class, 'show']);
        Route::get('/ruangan/json/{id}', [App\Http\Controllers\Administrator\Json\CommodityLocationController::class, 'show']);
    });

    Route::middleware(['administrative.staff'])->group(function () {
        Route::resource('/ubah-aset', CommodityUpdateController::class)->only('index', 'store');
        Route::resource('/laporan', ReportController::class)->only('index');
        Route::get('/laporan/ubah-aset/print/', [App\Http\Controllers\AdministrativeStaff\PrintController::class, 'print'])->name('laporan.ubah-aset.print');
        Route::get('/aset/json/{id}', [App\Http\Controllers\AdministrativeStaff\Json\CommodityController::class, 'show']);
    });

    Route::get('/laporan/print/{year}', [PrintController::class, 'printByYear'])->name('laporan.print.year');
    Route::patch('/profil/edit', [HomeController::class, 'updateProfile'])->name('home.profile.edit');
});
