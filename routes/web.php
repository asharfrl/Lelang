<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authanticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('login')->group(function () {

    // all access
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
    Route::get('dataHistory', [PembayaranController::class, 'history']);

    // admin
    Route::resource('dataKelas', KelasController::class)->middleware('admin');
    Route::resource('dataPetugas', PetugasController::class)->middleware('admin');
    Route::resource('dataSiswa', SiswaController::class)->middleware('admin');
    Route::resource('dataPembayaran', PembayaranController::class)->middleware('admin');
    Route::resource('dataSpp', SppController::class)->middleware('admin');

    // petugas
    Route::resource('dataPembayaran', PembayaranController::class)->middleware('petugas');
});

