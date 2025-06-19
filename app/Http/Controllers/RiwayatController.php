<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua riwayat milik user yang login, termasuk relasi penyewaan dan alat
        $riwayats = Riwayat::with(['penyewaan.alatCampings'])
                    ->where('user_id', Auth::id())
                    ->get();

        return view('riwayat', compact('riwayats'));
    }
}
