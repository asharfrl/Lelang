<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\LaporanController;

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

// Validasi
Route::get('/', [LoginController::class, 'index'])->name('welcome');
Route::post('/logins', [LoginController::class, 'authanticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/register', [LoginController::class, 'store']);



// Pembatas Akses
Route::middleware('login')->group(function () {

    // Admin & Petugas
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware('checkRole:Admin,Petugas');
    Route::resource('dataBarang', BarangController::class)->middleware('checkRole:Admin,Petugas');
    Route::resource('laporan', LaporanController::class)->middleware('checkRole:Admin,Petugas');
    Route::get('/laporan', [LaporanController::class, 'index'])->middleware('checkRole:Admin,Petugas');

    // Admin
    Route::resource('dataPetugas', PetugasController::class)->middleware('checkRole:Admin');

    // Petugas
    Route::get('/status', [StatusController::class, 'index'])->middleware('checkRole:Petugas');
    Route::get('/status/create', [StatusController::class, 'create'])->name('status.create')->middleware('checkRole:Petugas');

    // Masyarakat
    Route::resource('lelang', LelangController::class)->middleware('checkRole:Masyarakat');
    Route::get('/masyarakat', [LelangController::class, 'index'])->middleware('checkRole:Masyarakat');
    Route::get('/barang', [LelangController::class, 'show'])->middleware('checkRole:Masyarakat');
    Route::post('/lelang/store', [LelangController::class, 'store'])->name('lelang.store')->middleware('checkRole:Masyarakat');

});
