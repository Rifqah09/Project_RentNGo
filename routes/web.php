<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/redirect', [RedirectController::class, 'index'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::middleware(['role:staff'])->get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::middleware(['role:user'])->get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});


require __DIR__.'/auth.php';
