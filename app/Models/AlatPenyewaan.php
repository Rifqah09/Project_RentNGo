<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatPenyewaan extends Model
{
    use HasFactory;

    protected $table = 'alat_penyewaan';

    protected $fillable = [
        'penyewaan_id',
        'alat_camping_id',
        'jumlah',
        'subtotal',
    ];

    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class);
    }

    public function alatCamping()
    {
        return $this->belongsTo(AlatCamping::class);
    }
}
