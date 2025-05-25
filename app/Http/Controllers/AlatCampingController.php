<?php

namespace App\Http\Controllers;

use App\Models\AlatCamping;
use Illuminate\Http\Request;

class AlatCampingController extends Controller
{
    public function index()
    {
   
        $alatCampings = AlatCamping::all();
        return view('alat_camping.index', compact('alatCampings'));
    }

    public function create()
    {
        return view('alat_camping.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        AlatCamping::create($validated);

        return redirect()->route('alat_camping.index')->with('success', 'Alat camping berhasil ditambahkan');
    }

    public function show(AlatCamping $alatCamping)
    {
        return view('alat_camping.show', compact('alatCamping'));
    }

    public function edit(AlatCamping $alatCamping)
    {
        return view('alat_camping.edit', compact('alatCamping'));
    }

    public function update(Request $request, AlatCamping $alatCamping)
    {
        $validated = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $alatCamping->update($validated);

        return redirect()->route('alat_camping.index')->with('success', 'Alat camping berhasil diperbarui');
    }

    public function destroy(AlatCamping $alatCamping)
    {
        $alatCamping->delete();

        return redirect()->route('alat_camping.index')->with('success', 'Alat camping berhasil dihapus');
    }
}
