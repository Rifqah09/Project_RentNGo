<?php

use App\Http\Controllers\AlatCampingController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Models\AlatCamping;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect('/hai');
});
Route::get('/hai', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:admin')->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Route::get('/testing', function () {
    //     return 'asdfgh';
    // });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lihatalat', [AlatCampingController::class, 'lihatalat'])->name('lihatalat');
    Route::get('/tambahalat', [AlatCampingController::class, 'tambahalat'])->name('tambahalat');
    Route::post('/simpanalat', [AlatCampingController::class, 'simpanalat'])->name('simpanalat');
    Route::match(['get', 'post'], '/editalat/{id}', [AlatCampingController::class, 'editalat'])->name('editalat');
    Route::put('/updatealat/{id}', [AlatCampingController::class, 'updatealat'])->name('updatealat');
    Route::post('/deletealat/{id}', [AlatCampingController::class, 'deletealat'])->name('deletealat');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index')->middleware(['auth', 'role:admin']);
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    // Kelola Pembayaran (Admin/Staff)
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{id}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');

    // Kelola Penyewaan (Admin/Staff)
    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
    Route::post('/penyewaan/{id}/konfirmasi', [PenyewaanController::class, 'konfirmasi'])->name('penyewaan.konfirmasi');
    Route::post('/penyewaan/{id}/selesai', [PenyewaanController::class, 'selesai'])->name('penyewaan.selesai');
});
Route::middleware('auth', 'role:admin,staff')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lihatalat', [AlatCampingController::class, 'lihatalat'])->name('lihatalat');
    Route::get('/tambahalat', [AlatCampingController::class, 'tambahalat'])->name('tambahalat');
    Route::post('/simpanalat', [AlatCampingController::class, 'simpanalat'])->name('simpanalat');
    Route::match(['get', 'post'], '/editalat/{id}', [AlatCampingController::class, 'editalat'])->name('editalat');
    Route::put('/updatealat/{id}', [AlatCampingController::class, 'updatealat'])->name('updatealat');
    Route::post('/deletealat/{id}', [AlatCampingController::class, 'deletealat'])->name('deletealat');


    // Kelola Pembayaran (Admin/Staff)
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{id}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');

    // Kelola Penyewaan (Admin/Staff)
    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
    Route::post('/penyewaan/{id}/konfirmasi', [PenyewaanController::class, 'konfirmasi'])->name('penyewaan.konfirmasi');
    Route::post('/penyewaan/{id}/selesai', [PenyewaanController::class, 'selesai'])->name('penyewaan.selesai');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 👥 Lihat alat & sewa

    Route::get('/lihatdantambah', function () {
        $alat = AlatCamping::all();
        return view('lihatdansewa', compact('alat'));
    })->name('lihatdansewa');
    // Buat penyewaan
    Route::post('/penyewaan/{alat_id}/buat', [PenyewaanController::class, 'buat'])->name('penyewaan.buat');
    Route::post('/sewa-alat', [PenyewaanController::class, 'sewa'])->name('sewa.alat');
    //  Riwayat penyewaan
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat')->middleware('auth');

    //  Batalkan penyewaan
    Route::post('/penyewaan/{id}/batal', [PenyewaanController::class, 'batal'])->name('penyewaan.batal');

    Route::get('/pembayaran/{penyewaan_id}/upload', [PembayaranController::class, 'uploadForm'])->name('pembayaran.upload.form');
    Route::post('/pembayaran/{penyewaan_id}/upload', [PembayaranController::class, 'upload'])->name('pembayaran.upload');
    Route::get('/status', [PembayaranController::class, 'status'])->name('status');
});


require __DIR__ . '/auth.php';
