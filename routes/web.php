<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// ==========================================
// ROUTE LOGIN
// ==========================================

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

// ==========================================
// ROUTE LOGOUT
// ==========================================

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ==========================================
// ROUTE YANG MEMERLUKAN LOGIN
// ==========================================

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // ======================================
    // SURAT MASUK
    // ======================================

    // Daftar surat masuk
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])
        ->name('surat-masuk.index');

    // Khusus Petugas
    Route::middleware('can:manage-letters')->group(function () {

        Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])
            ->name('surat-masuk.create');

        Route::post('/surat-masuk', [SuratMasukController::class, 'store'])
            ->name('surat-masuk.store');

        Route::get('/surat-masuk/{id}/edit', [SuratMasukController::class, 'edit'])
            ->name('surat-masuk.edit');

        Route::put('/surat-masuk/{id}', [SuratMasukController::class, 'update'])
            ->name('surat-masuk.update');

        Route::delete('/surat-masuk/{id}', [SuratMasukController::class, 'destroy'])
            ->name('surat-masuk.destroy');
    });

    // Detail surat masuk
    Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])
        ->name('surat-masuk.show');

    // ======================================
    // SURAT KELUAR
    // ======================================

    // Daftar surat keluar
    Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])
        ->name('surat-keluar.index');

    // Khusus Petugas
    Route::middleware('can:manage-letters')->group(function () {

        Route::get('/surat-keluar/create', [SuratKeluarController::class, 'create'])
            ->name('surat-keluar.create');

        Route::post('/surat-keluar', [SuratKeluarController::class, 'store'])
            ->name('surat-keluar.store');

        Route::get('/surat-keluar/{id}/edit', [SuratKeluarController::class, 'edit'])
            ->name('surat-keluar.edit');

        Route::put('/surat-keluar/{id}', [SuratKeluarController::class, 'update'])
            ->name('surat-keluar.update');

        Route::delete('/surat-keluar/{id}', [SuratKeluarController::class, 'destroy'])
            ->name('surat-keluar.destroy');
    });

    // Detail surat keluar
    Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show'])
        ->name('surat-keluar.show');
});