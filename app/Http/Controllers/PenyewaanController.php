<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Event\Tracer\Tracer;

class PenyewaanController extends Controller
{
    // Menampilkan semua data penyewaan (khusus untuk admin/staff)
    public function index()
    {
        $penyewaans = Penyewaan::with('user')->get();
        return view('Admin.penyewaan', compact('penyewaans'));
    }

    // Mengkonfirmasi penyewaan (ubah status ke confirmed)
    public function konfirmasi($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);
        if ($penyewaan->status === 'pending') {
            $penyewaan->update(['status' => 'confirmed']);
        }

        return back()->with('success', 'Penyewaan dikonfirmasi.');
    }

    // Menandai penyewaan sebagai selesai (ubah status ke returned)
    public function selesai($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);
        if ($penyewaan->status === 'confirmed') {
            $penyewaan->update(['status' => 'returned']);
        }

        return back()->with('success', 'Penyewaan ditandai selesai.');
    }
    public function sewa(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validasi minimal 1 alat dipilih
            $request->validate([
                'alat_id' => 'required|array',
                'jumlah' => 'required|array',
                'alat_id.*' => 'exists:alat_campings,id',
                'jumlah.*' => 'required|integer|min:1',
            ]);

            // Buat penyewaan baru
            $sewa = new Penyewaan;
            $sewa->user_id = Auth::id();
            $sewa->tanggal_sewa = now();
            $sewa->tanggal_kembali = now()->addDays(2); // tgl kembali HARUS di masa depan
            $sewa->status = 'pending';
            $sewa->save();

            // Simpan ke tabel pivot (alat_penyewaan)
            foreach ($request->alat_id as $index => $alat_id) {
                $jumlah = $request->jumlah[$index];
                $harga = 10000; // kamu bisa ubah dari DB kalau harga dinamis
                $subtotal = $harga * $jumlah;

                $sewa->alatCampings()->attach($alat_id, [
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);
            }

            // Simpan ke tabel riwayat
            Riwayat::create([
                'user_id' => Auth::id(),
                'penyewaan_id' => $sewa->id,
            ]);

            DB::commit();
            return redirect()->route('pembayaran.upload.form', $sewa->id)
                ->with('success', 'Berhasil disewa, lanjutkan ke pembayaran.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('lihatdansewa')->with('gagal', 'Gagal: ' . $th->getMessage());
        }
    }
}
