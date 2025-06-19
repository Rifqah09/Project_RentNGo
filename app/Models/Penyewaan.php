<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyewaan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal_sewa', 'tanggal_kembali', 'status'];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi many-to-many ke alat camping lewat pivot `alat_penyewaan`
    public function alatCampings()
    {
        return $this->belongsToMany(AlatCamping::class, 'alat_penyewaan')
                    ->withPivot('jumlah', 'subtotal')
                    ->withTimestamps();
    }

    // Relasi ke pembayaran (jika ada)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    // Relasi ke riwayat
    public function riwayat()
    {
        return $this->hasOne(Riwayat::class);
    }
}
