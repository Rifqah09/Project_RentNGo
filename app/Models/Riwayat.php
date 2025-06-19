<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = ['user_id', 'penyewaan_id'];

    // Relasi ke penyewaan
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class);
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
