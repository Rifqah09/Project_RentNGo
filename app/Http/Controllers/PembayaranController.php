<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    // Menampilkan semua data pembayaran untuk admin/staff
    public function index()
    {
        // Mengambil semua data pembayaran dengan relasi penyewaan dan user
        $pembayarans = Pembayaran::with('penyewaan.user')->get();
        return view('Admin.pembayaran', compact('pembayarans'));
    }

    // Mengkonfirmasi pembayaran (ubah status menjadi completed)
    public function konfirmasi($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Hanya bisa dikonfirmasi jika masih pending
        if ($pembayaran->status === 'pending') {
            $pembayaran->update([
                'status' => 'completed',
                'payment_date' => now(),
            ]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
