<?php

namespace App\Http\Controllers;

use App\Models\AlatCamping;
use Illuminate\Http\Request;

class AlatCampingController extends Controller
{
    // Menampilkan semua data alat camping
    public function lihatalat()
    {
        $alat = AlatCamping::all();
        return view('lihatalat', compact('alat'));
    }

    // Menampilkan form tambah alat camping
    public function tambahalat()
    {
        return view('tambahalat');
    }

    // Menyimpan data alat camping baru ke database (versi terbaru dengan gambar_url)
    public function simpanalat(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar_url' => 'required|url',
        ]);

        AlatCamping::create([
            'nama_alat' => $request->nama_alat,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'gambar_url' => $request->gambar_url,
        ]);

        return redirect()->route('lihatalat')->with('sukses', 'Alat camping berhasil ditambahkan!');
    }

    // Menampilkan form edit berdasarkan ID
    public function editalat(Request $request, $id)
    {
        $alat = AlatCamping::findOrFail($id);
        return view('editalat', compact('alat'));
    }

    // Memperbarui data alat camping berdasarkan ID
    public function updatealat(Request $request, $id)
    {
        $alat = AlatCamping::findOrFail($id);

        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar_url' => 'required|url',
        ]);

        $alat->update([
            'nama_alat' => $request->nama_alat,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'gambar_url' => $request->gambar_url,

        ]);
        $alat->save();

        return redirect()->route('lihatalat')->with('success', 'Data alat camping berhasil diperbarui.');
        dd('Redirect berhasil');
    }

    // Menghapus data alat camping berdasarkan ID
    public function deletealat($id)
    {
        $alat = AlatCamping::findOrFail($id);
        $alat->delete();

        return redirect()->route('lihatalat')->with('success', 'Data alat camping berhasil dihapus.');
    }
}
