<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataBasisPengetahuanController;
use App\Http\Controllers\Admin\DataGejalaController;
use App\Http\Controllers\Admin\DataPenyakitController;
use App\Http\Controllers\Admin\DataRiwayatKasusController;
use App\Http\Controllers\Admin\DataRiwayatPasienController;
use App\Http\Controllers\Admin\UbahPasswordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\BerandaController;
use App\Http\Controllers\Guest\DiagnosaController;
use App\Http\Controllers\Guest\InformasiPenyakitController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/diagnosa', [DiagnosaController::class, 'index']);
    Route::post('/diagnosa', [DiagnosaController::class, 'prosesData']);
    Route::get('/diagnosa/{id_pasien}', [DiagnosaController::class, 'showData']);
    Route::get('/diagnosa/{id_pasien}/print', [DiagnosaController::class, 'printData']);
    Route::get('/informasi-penyakit', [InformasiPenyakitController::class, 'index']);

    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);
    Route::get('/lupa-password', [AuthController::class, 'lupapasswordPage']);
    Route::post('/lupa-password', [AuthController::class, 'lupapasswordProcess']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('data-penyakit', DataPenyakitController::class)->except('show');
    Route::resource('data-gejala', DataGejalaController::class)->except('show');
    Route::resource('data-basis-pengetahuan', DataBasisPengetahuanController::class)->except('show');
    Route::resource('data-riwayat-kasus', DataRiwayatKasusController::class)->except('show');
    Route::get('data-riwayat-pasien', [DataRiwayatPasienController::class, 'index']);
    Route::get('data-riwayat-pasien/{id_pasien}', [DataRiwayatPasienController::class, 'showData']);
    Route::get('data-riwayat-pasien/{id_pasien}/print', [DataRiwayatPasienController::class, 'printData']);
    Route::delete('data-riwayat-pasien/{id_pasien}', [DataRiwayatPasienController::class, 'hapusData']);
    Route::get('ubah-password', [UbahPasswordController::class, 'index']);
    Route::post('ubah-password', [UbahPasswordController::class, 'prosesUbahPassword']);
    Route::post('logout', [AuthController::class, 'logout']);
});
