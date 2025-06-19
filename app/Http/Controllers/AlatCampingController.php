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

    // Menyimpan data alat camping baru ke database
    public function simpanalat(Request $request)
{
    $request->validate([
        'nama_alat' => 'required|string|max:255',
        'harga_sewa' => 'required|numeric',
        'deskripsi' => 'nullable|string',
        // 'stok' => 'required|integer|min:0',
    ]);

    AlatCamping::create($request->all());

    return redirect()->route('lihatalat')->with('success', 'Data alat camping berhasil ditambahkan.');
}

    // Menampilkan form edit berdasarkan ID
    public function editalat(Request $request, $id)
    {
        $alat = AlatCamping::find($id);
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
        // 'stok' => 'required|integer|min:0',
    ]);

    $alat->update($request->only(['nama_alat', 'harga_sewa', 'deskripsi', 'stok']));

    return redirect()->route('lihatalat')->with('success', 'Data alat camping berhasil diperbarui.');
}

    // Menghapus data alat camping berdasarkan ID
    public function deletealat($id)
    {
        $alat = AlatCamping::find($id);
        $alat->delete();

        return redirect()->route('lihatalat')->with('success', 'Data alat camping berhasil dihapus.');
    }
}
