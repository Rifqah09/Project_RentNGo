<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function create($penyewaanId)
    {
        $penyewaan = Penyewaan::findOrFail($penyewaanId);

        // Hitung total pembayaran dari alat_penyewaan
        $subtotal = $penyewaan->alatCampings->sum(function ($alat) {
            return $alat->pivot->subtotal;
        });

        return view('pembayaran.create', compact('penyewaan', 'subtotal'));
    }

    public function store(Request $request, $penyewaanId)
    {
        $penyewaan = Penyewaan::findOrFail($penyewaanId);

        // Cek jika sudah ada pembayaran
        if ($penyewaan->pembayaran) {
            return redirect()->back()->withErrors('Pembayaran sudah dilakukan');
        }

        $validated = $request->validate([
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,completed,failed',
        ]);

        // Simpan pembayaran, metode pembayaran cuma 'cash'
        $subtotal = $penyewaan->alatCampings->sum(fn($alat) => $alat->pivot->subtotal);

        $pembayaran = Pembayaran::create([
            'penyewaan_id' => $penyewaan->id,
            'subtotal' => $subtotal,
            'payment_date' => $validated['payment_date'],
            'metode_pembayaran' => 'cash',
            'status' => $validated['status'],
        ]);

        // Jika pembayaran completed, update status penyewaan
        if ($validated['status'] === 'completed') {
            $penyewaan->update(['status' => 'confirmed']);
        }

        return redirect()->route('penyewaan.show', $penyewaan)->with('success', 'Pembayaran berhasil diproses.');
    }
}
