<?php
// app/Http/Controllers/PenyewaanController.php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\AlatCamping;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        // Menampilkan semua penyewaan
        $penyewaans = Penyewaan::all();
        return view('penyewaan.index', compact('penyewaans'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat penyewaan baru
        $alatCampings = AlatCamping::all(); // Ambil semua alat camping
        return view('penyewaan.create', compact('alatCampings'));
    }

    public function store(Request $request)
{
    DB::beginTransaction(); // Mulai transaksi

    try {
        // Validasi input
        $request->validate([
            'alat_camping_id' => 'required|exists:alat_campings,id',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
        ]);

        // Ambil alat camping berdasarkan id
        $alat = AlatCamping::findOrFail($request->alat_camping_id);

        // Cek apakah stok alat cukup
        if ($alat->stok <= 0) {
            return back()->withErrors(['stok' => 'Stok alat tidak cukup.']);
        }

        // Buat penyewaan
        $penyewaan = Penyewaan::create([
            'user_id' => auth()->id(),
            'alat_camping_id' => $request->alat_camping_id,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        // Kurangi stok alat
        $alat->decrement('stok');

        // Jika semua berhasil, commit transaksi
        DB::commit();

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dibuat.');
    } catch (\Exception $e) {
        // Jika ada error, rollback transaksi
        DB::rollBack();
        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}
}