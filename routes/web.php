<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlatCampingController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'can:isAdminOrStaff'])->group(function () {
    Route::resource('/alat-camping', AlatCampingController::class);
});
Route::resource('alat_camping', AlatCampingController::class)->middleware('auth');
Route::resource('penyewaan', PenyewaanController::class)->middleware('auth');


Route::get('penyewaan/{penyewaan}/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create')->middleware('auth');
Route::post('penyewaan/{penyewaan}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store')->middleware('auth');
require __DIR__.'/auth.php';
