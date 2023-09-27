<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabibController;
use App\Http\Controllers\StatusPemesananController;
use App\Http\Controllers\PengobatanInformasiController;
use App\Http\Controllers\PengobatanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\HomeuserController;
use App\Http\Controllers\kelolaLaporanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\HistoryPemesananController;
use App\Http\Controllers\NonaktifController;


//user//
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;



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

Route::get('/99ryyn88', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('user.loginuser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kelolaPemesanan', App\Http\Controllers\kelolaPemesananController::class);
Route::resource('kelolaTabib', App\Http\Controllers\kelolaTabibController::class);
Route::resource('kelolaPengobatan', App\Http\Controllers\kelolaPengobatanController::class);

//pesanan diterima
Route::get('/pesananditerima/{id}', [kelolaLaporanController::class, 'pesananditerima'])->name('pesananditerima');
Route::get('/pesananditerima', [kelolaLaporanController::class, 'vPesananDiterima'])->name('vPesananDiterima');
Route::delete('/pesananditerima/{id}', [kelolaLaporanController::class, 'destroy'])->name('posts.destroy');
Route::get('/cetakditerima', [kelolaLaporanController::class,'cetakditerima'])->name('cetakditerima');

//nonaktif tabib
Route::get('/tabibnonaktif/{id}', [NonaktifController::class, 'nonaktif'])->name('tabibnonaktif');
Route::get('/tabibnonaktif', [NonaktifController::class, 'vNonaktif'])->name('vNonaktif');
//aktif tabib
Route::get('/tabibaktif/{id}', [NonaktifController::class, 'aktif'])->name('tabibaktif');

//pesanan ditolak
Route::get('/pesananditolak/{id}', [kelolaLaporanController::class, 'pesananditolak'])->name('pesananditolak');
Route::get('/cetakditolak', [kelolaLaporanController::class,'cetakditolak'])->name('cetakditolak');
Route::get('/pesananditolak', [kelolaLaporanController::class, 'vPesananDitolak'])->name('vPesananDitolak');

//pengguna
Route::get('/penggunaadmin', [PenggunaController::class,'penggunaadmin'])->name('penggunaadmin');
Route::post('/penggunaadmin', [PenggunaController::class,'store'])->name('tambahdata');
Route::resource('pengguna', App\Http\Controllers\PenggunaController::class);
Route::get('/penggunapasien', [PenggunaController::class,'penggunapasien'])->name('penggunapasien');
Route::delete('/penggunaadmin/{id}', [PenggunaController::class, 'destroyadmin'])->name('destroyadmin');
Route::delete('/penggunapasien/{id}', [PenggunaController::class, 'destroypasien'])->name('destroypasien');

//laporan
// routes/web.php
Route::get('/filterByMonthDiterima', [kelolaLaporanController::class, 'filterByMonthDiterima'])->name('filterByMonthDiterima');
Route::get('/filterByMonthDitolak', [kelolaLaporanController::class, 'filterByMonthDitolak'])->name('filterByMonthDitolak');
Route::get('/cetakPdf', [kelolaLaporanController::class, 'cetakPdf'])->name('cetakPdf');
Route::get('/fect', [kelolaLaporanController::class, 'fecth'])->name('fecth');













//User login mobile
Route::get('/loginuser', [LoginUserController::class, 'loginuser'])->name('loginuser');
Route::get('/registeruser', [RegisterUserController::class, 'register'])->name('register');
Route::post('/registeruserstore', [RegisterUserController::class, 'store'])->name('registeruserstore');
Route::post('actionlogin', [LoginUserController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginUserController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


Route::get('/tabib', [TabibController::class, 'tabib'])->name('tabib');
Route::get('/statuspemesanan/{id}', [StatusPemesananController::class, 'statuspemesanan'])->name('status.pemesanan');
// Route::get('/pengobataninformasi', [PengobatanInformasiController::class, 'pengobataninformasi'])->name('pengobataninformasi');
Route::get('/pengobataninformasi/{pengobatan}', [PengobatanInformasiController::class, 'show'])->name('informasi.pengobatan');
Route::get('/pengobatan', [PengobatanController::class, 'pengobatan'])->name('pengobatan');
Route::get('/pemesanan', [PemesananController::class, 'pemesanan'])->name('pemesanan');
Route::get('/homeuser', [HomeuserController::class, 'home'])->name('homeuser');
Route::post('/pemesananstore', [PemesananController::class, 'store'])->name('pemesananstore');


// historypemesanan
Route::get('/historypemesanan', [HistoryPemesananController::class, 'index'])->name('historypemesanan');
Route::get('/selesai{id}', [HistoryPemesananController::class, 'selesai'])->name('selesai');
// Route::get('historypemesanan/{id}/finish', [HistoryPemesananController::class, 'finish'])->name('historypemesanan.finish');



