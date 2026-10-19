
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('welcome');
});

// Route daftar surat masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])
    ->name('surat-masuk.index');

// Route detail surat masuk
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])
    ->name('surat-masuk.show');
