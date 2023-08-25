<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananAPIController;
use App\Http\Controllers\TabibAPIController;
use App\Http\Controllers\PengobatanAPIController;
use App\Http\Controllers\UserAPIController;

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

Route::post('/pemesanan', [PemesananAPIController::class, 'createPemesanan']);
Route::get('/pemesanan/{id}', [PemesananAPIController::class, 'show']);
Route::get('/tabib/{id}', [TabibAPIController::class, 'show']);
Route::get('/tabib', [TabibAPIController::class, 'index']);
Route::get('/pengobatan/{id}', [PengobatanAPIController::class, 'show']);
Route::get('/pengobatan', [PengobatanAPIController::class, 'index']);
Route::post('/register', [UserAPIController::class, 'register']);
