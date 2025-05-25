<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\AlatCamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaanController extends Controller
{
    public function index()
    {
        // Tampilkan penyewaan user saat ini (atau admin bisa lihat semua)
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'staff') {
            $penyewaans = Penyewaan::with('user', 'alatCampings')->get();
        } else {
            $penyewaans = Penyewaan::with('alatCampings')->where('user_id', Auth::id())->get();
        }
        return view('penyewaan.index', compact('penyewaans'));
    }

    public function create()
    {
        $alatCampings = AlatCamping::where('stok', '>', 0)->get();
        return view('penyewaan.create', compact('alatCampings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_sewa' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'alat_camping' => 'required|array',
            'alat_camping.*' => 'exists:alat_camping,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
        ]);

        // Simpan penyewaan
        $penyewaan = Penyewaan::create([
            'user_id' => Auth::id(),
            'tanggal_sewa' => $validated['tanggal_sewa'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'status' => 'pending',
        ]);

        // Hitung jumlah hari sewa
        $start = new \DateTime($validated['tanggal_sewa']);
        $end = new \DateTime($validated['tanggal_kembali']);
        $diff = $start->diff($end)->days;

        // Attach alat yang disewa ke pivot dengan jumlah dan subtotal
        foreach ($validated['alat_camping'] as $index => $alatId) {
            $alat = AlatCamping::findOrFail($alatId);
            $qty = $validated['jumlah'][$index];
            $subtotal = $alat->harga_sewa * $qty * $diff;

            $penyewaan->alatCampings()->attach($alatId, [
                'jumlah' => $qty,
                'subtotal' => $subtotal,
            ]);

            // Update stok alat
            $alat->decrement('stok', $qty);
        }

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dibuat dan menunggu konfirmasi.');
    }

    public function show(Penyewaan $penyewaan)
    {
        $this->authorize('view', $penyewaan); // Pakai policy untuk user only
        $penyewaan->load('alatCampings', 'pembayaran');
        return view('penyewaan.show', compact('penyewaan'));
    }

    public function edit(Penyewaan $penyewaan)
    {
        // Bisa ditambahkan editing penyewaan sesuai kebutuhan
        abort(403, 'Edit penyewaan belum disediakan');
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        // Update status misal dari admin/staff
        $this->authorize('update', $penyewaan);
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,returned,canceled',
        ]);
        $penyewaan->update(['status' => $validated['status']]);
        return redirect()->back()->with('success', 'Status penyewaan diperbarui.');
    }

    public function destroy(Penyewaan $penyewaan)
    {
        // Hapus penyewaan, dan kembalikan stok alat
        $this->authorize('delete', $penyewaan);
        foreach ($penyewaan->alatCampings as $alat) {
            $alat->increment('stok', $alat->pivot->jumlah);
        }
        $penyewaan->delete();
        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
