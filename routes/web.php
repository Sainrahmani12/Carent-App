<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatamobilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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