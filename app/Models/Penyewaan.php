<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';

    protected $fillable = [
        'user_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alatCampings()
    {
        return $this->belongsToMany(AlatCamping::class, 'alat_penyewaan')
            ->withPivot('jumlah', 'subtotal')
            ->withTimestamps();
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
