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
        // Validasi input
        $request->validate([
            'alat_camping_id' => 'required|exists:alat_campings,id',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
        ]);

        // Buat penyewaan baru
        Penyewaan::create([
            'user_id' => auth()->id(),
            'alat_camping_id' => $request->alat_camping_id,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dibuat.');
    }

    public function show($id)
    {
        // Menampilkan detail penyewaan berdasarkan ID
        $penyewaan = Penyewaan::findOrFail($id);
        return view('penyewaan.show', compact('penyewaan'));
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit penyewaan
        $penyewaan = Penyewaan::findOrFail($id);
        $alatCampings = AlatCamping::all(); // Ambil semua alat camping
        return view('penyewaan.edit', compact('penyewaan', 'alatCampings'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'alat_camping_id' => 'required|exists:alat_campings,id',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
        ]);

        // Update penyewaan
        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->update([
            'alat_camping_id' => $request->alat_camping_id,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menghapus penyewaan
        Penyewaan::findOrFail($id)->delete();
        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
