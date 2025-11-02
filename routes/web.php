<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;



Route::get('pdf.blade.php', [MahasiswaController::class, 'cetakPDF'])->name('mahasiswa.cetakPDF');
Route::get('mahasiswa/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');
Route::resource('mahasiswa', MahasiswaController::class);