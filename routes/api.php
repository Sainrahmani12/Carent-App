<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MobilController;
use App\Http\Controllers\API\SupirController;
use App\Http\Controllers\API\TagihanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(MobilController::class)->group(function(){
    Route::get('/mobil', 'all');
});

Route::controller(SupirController::class)->group(function(){
    Route::get('/supir', 'all');
});

Route::controller(TagihanController::class)->group(function(){
    Route::get('/tagihan', 'all');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/regis', 'regis');
    Route::post('/login', 'login');
});

