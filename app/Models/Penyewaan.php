<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyewaan extends Model
{
    use HasFactory;

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

    // Relasi many-to-many dengan alat_camping lewat pivot
    public function alatCamping()
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
