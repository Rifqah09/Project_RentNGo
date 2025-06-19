<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
use App\Models\Penyewaan;

class PembayaranController extends Controller
{
    // Menampilkan semua data pembayaran untuk admin/staff
    public function index()
    {
        $pembayarans = Pembayaran::with('penyewaan.user')->get();
        return view('Admin.pembayaran', compact('pembayarans'));
    }

    // Mengkonfirmasi pembayaran
    public function konfirmasi($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->status === 'pending') {
            $pembayaran->update([
                'status' => 'completed',
                'payment_date' => now(),
            ]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    // Simpan pembayaran dari user
   public function upload(Request $request, $penyewaan_id)
{
    $request->validate([
        'metode_pembayaran' => 'required|in:credit,transfer,cash'
    ]);

    // Ambil data penyewaan beserta relasi alatCampings
    $penyewaan = Penyewaan::with('alatCampings')->findOrFail($penyewaan_id);

    // Hitung total dari semua alat pada pivot
    $subtotal = 0;
    foreach ($penyewaan->alatCampings as $alat) {
        $subtotal += $alat->pivot->subtotal ?? 0;
    }

    Pembayaran::create([
        'penyewaan_id' => $penyewaan->id,
        'payment_date' => now(),
        'subtotal' => $subtotal,
        'status' => 'pending',
        'metode_pembayaran' => $request->metode_pembayaran,
    ]);

    return redirect()->route('status')->with('success', 'Data pembayaran berhasil dikirim.');
}


    // Menampilkan form upload bukti pembayaran
    public function uploadForm($penyewaan_id)
    {
        return view('upload', compact('penyewaan_id'));
    }

    // Menampilkan status pembayaran untuk user login
    public function status()
    {
        $userId = Auth::id();

        $pembayaran = Pembayaran::whereHas('penyewaan', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('penyewaan')->get();

        return view('status', compact('pembayaran'));
    }
}
