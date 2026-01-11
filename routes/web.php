<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaMagangController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Halaman utama redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route Authentication (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Route Logout (Authenticated)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route untuk Peserta Magang
Route::middleware(['auth', 'cek.role:peserta_magang'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', [PesertaMagangController::class, 'dashboard'])->name('dashboard');
    Route::post('/presensi-masuk', [PesertaMagangController::class, 'presensiMasuk'])->name('presensi.masuk');
    Route::post('/presensi-keluar', [PesertaMagangController::class, 'presensiKeluar'])->name('presensi.keluar');
    Route::get('/izin', [PesertaMagangController::class, 'formIzin'])->name('izin.form');
    Route::post('/izin', [PesertaMagangController::class, 'simpanIzin'])->name('izin.simpan');
});

// Route untuk Admin
Route::middleware(['auth', 'cek.role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/presensi', [AdminController::class, 'dataPresensi'])->name('presensi');
    Route::get('/izin', [AdminController::class, 'dataIzin'])->name('izin');
    Route::get('/izin/{id}', [AdminController::class, 'detailIzin'])->name('izin.detail');
});