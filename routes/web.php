<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatamobilController;
use App\Http\Controllers\DatasupirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PesananController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/pemesanan', 'pemesanan');
    Route::post('/pesanid', 'store')->name('pesanid');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard', 'index');
    Route::get('/tagihan-peminjaman', 'tagihan');
    Route::get('/jadwal-peminjaman', 'jadwal');
});

Route::controller(PesananController::class)->group(function(){
    Route::get('/pemesanan', 'pemesanan');
});

Route::controller(DatamobilController::class)->group(function(){
    Route::get('/datamobil', 'index');
    Route::post('/editdatamobil/{id}', 'update');
    Route::post('/tambahdatamobil', 'store');
    Route::get('/deletedatamobil/{id}', 'destroy');
});

Route::controller(DatasupirController::class)->group(function(){
    Route::get('/supir', 'index');
    Route::post('/editdatasupir/{id}', 'update');
    Route::post('/tambahdatasupir', 'store');
    Route::get('/deletedatasupir/{id}', 'destroy'); 
});

Route::controller(IdentitasController::class)->group(function(){
    Route::get('/identitas-peminjam', 'index');
    Route::post('/updateidentitas/{id}', 'update');
    Route::get('/deleteidentitas/{id}', 'destroy');
});