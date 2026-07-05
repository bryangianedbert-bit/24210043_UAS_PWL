<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\DetailKrsController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('jurusan', JurusanController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('mata_kuliah', MataKuliahController::class);
    Route::resource('kelas', KelasController::class);
    
    // Route Cetak KRS ditambahkan di sini (sebelum resource krs)
    Route::get('/krs/{id}/cetak', [KrsController::class, 'cetak'])->name('krs.cetak');
    Route::resource('krs', KrsController::class);
    
    Route::resource('detail_krs', DetailKrsController::class);
});