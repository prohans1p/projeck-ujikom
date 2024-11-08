<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserBarangController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserPeminjamanController;
use App\Http\Controllers\UserPengembalianController;
use App\Http\Controllers\UserRiwayatController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware([AdminMiddleware::class])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('dashboard', UtamaController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);

});
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function() {

// });

Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function() {
    Route::resource('utama', UserDashboardController::class);
    Route::resource('daftar', UserBarangController::class);
    Route::resource('user/pmj', UserPeminjamanController::class);
    Route::resource('user/pmb', UserPengembalianController::class);
    Route::resource('user/riwayat', UserRiwayatController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
