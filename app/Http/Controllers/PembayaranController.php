<?php
// app/Http/Controllers/PembayaranController.php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Menampilkan semua pembayaran
        $pembayarans = Pembayaran::all();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create($penyewaanId)
    {
        // Menampilkan form untuk membuat pembayaran baru berdasarkan penyewaan
        $penyewaan = Penyewaan::findOrFail($penyewaanId);
        return view('pembayaran.create', compact('penyewaan'));
    }

    public function store(Request $request, $penyewaanId)
    {
        // Validasi input
        $request->validate([
            'total' => 'required|numeric|min:0',
            'metode' => 'required|string',
        ]);

        // Cari penyewaan berdasarkan ID
        $penyewaan = Penyewaan::findOrFail($penyewaanId);

        // Buat pembayaran baru
        Pembayaran::create([
            'penyewaan_id' => $penyewaan->id,
            'total' => $request->total,
            'metode' => $request->metode,
            'status' => 'belum bayar', // Status default
        ]);

        // Update status penyewaan menjadi 'selesai' jika pembayaran dilakukan
        $penyewaan->update(['status' => 'selesai']);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dibuat.');
    }

    public function show($id)
    {
        // Menampilkan detail pembayaran
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit pembayaran
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'total' => 'required|numeric|min:0',
            'metode' => 'required|string',
        ]);

        // Update pembayaran
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'total' => $request->total,
            'metode' => $request->metode,
            'status' => $request->status,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menghapus pembayaran
        Pembayaran::findOrFail($id)->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
