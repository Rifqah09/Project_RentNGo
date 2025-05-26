<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatCamping extends Model
{
    use HasFactory;

    protected $fillable = ['nama_alat', 'deskripsi', 'harga_sewa', 'stok'];

    public function penyewaans()
    {
        return $this->belongsToMany(Penyewaan::class, 'alat_penyewaan')
            ->withPivot('jumlah', 'subtotal')
            ->withTimestamps();
    }
}

