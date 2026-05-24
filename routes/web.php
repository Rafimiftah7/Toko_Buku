<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// === MODE OFFLINE SEMENTARA ===
// Hapus baris di bawah ini jika ingin website bisa diakses kembali
abort(503, 'Website sedang dimatikan untuk sementara waktu.');

/*
|--------------------------------------------------------------------------
| Web Routes — Toko Buku Harmony (UTS Laravel MVC)
|--------------------------------------------------------------------------
*/

// === HALAMAN UTAMA: Storefront (publik, bisa diakses siapapun) ===
Route::get('/', [BukuController::class, 'index'])->name('home');

// === RESOURCE BUKU (CRUD) — hanya admin yang bisa akses create/edit/delete ===
Route::resource('buku', BukuController::class);

// === RESOURCE KATEGORI (CRUD) — hanya admin ===
Route::resource('kategori', KategoriController::class)->except(['show']);

// === ADMIN DASHBOARD ===
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Profile Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
