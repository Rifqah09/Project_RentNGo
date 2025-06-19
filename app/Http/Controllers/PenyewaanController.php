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
    public function sewa(){
        DB::beginTransaction();
       try {
        $sewa = new Penyewaan; 
        $sewa -> user_id = Auth::user()->id;
        $sewa -> tanggal_sewa = now();
        $sewa -> tanggal_kembali = now()->subDay(2);
        $sewa -> save();
// dd($sewa);
        $data  = new Riwayat();
        $data -> user_id = Auth::user()->id;
        $data -> penyewaan_id = $sewa->id;
        $data -> save();
        
        DB::commit();
        return redirect() -> route('lihatdansewa')->with('sukses, berhasil disewa');
       } catch (\Throwable $th) {
        DB::rollBack();
         return redirect() -> route('lihatdansewa')->with('gagal', 'gagal' . $th->getMessage());
       }
       
        
    }
    
}
