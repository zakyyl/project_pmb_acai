<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminJurusanController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaPortalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - PMB ACAI
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// Portal Mahasiswa (Auth Required)
Route::middleware(['auth'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/formulir', [MahasiswaPortalController::class, 'formulir'])->name('formulir');
    Route::post('/formulir', [MahasiswaPortalController::class, 'storeFormulir'])->name('formulir.store');
    Route::get('/kartu-ujian', [MahasiswaPortalController::class, 'kartuUjian'])->name('kartu_ujian');
});

// Portal Administrator (Auth & Role Admin Required)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Data Mahasiswa
    Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/{id}', [AdminMahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::put('/mahasiswa/{id}', [AdminMahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Verifikasi Dokumen & Ujian
    Route::get('/dokumen', [AdminPendaftaranController::class, 'index'])->name('dokumen.index');
    Route::put('/pendaftaran/{id}', [AdminPendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::get('/verifikasi-ujian', [AdminPendaftaranController::class, 'verifikasiUjianIndex'])->name('ujian.index');
    Route::put('/verifikasi-ujian/{id}', [AdminPendaftaranController::class, 'updateVerifikasiUjian'])->name('ujian.update');
    Route::delete('/pendaftaran/{id}', [AdminPendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');

    // Laporan
    Route::get('/laporan-administrasi', [AdminPendaftaranController::class, 'laporanAdmin'])->name('laporan.administrasi');
    Route::get('/laporan-ujian', [AdminPendaftaranController::class, 'laporanUjian'])->name('laporan.ujian');

    // Manajemen Jurusan
    Route::resource('jurusan', AdminJurusanController::class)->except(['create', 'edit', 'show']);
});
