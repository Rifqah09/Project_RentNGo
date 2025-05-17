<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatCamping extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',  
        'deskripsi',
        'stok',
        'harga_sewa',
    ];

    // Karena relasi many-to-many dengan penyewaan lewat pivot tabel 'alat_penyewaan'
    public function penyewaans()
    {
        return $this->belongsToMany(Penyewaan::class, 'alat_penyewaan')
                    ->withPivot('jumlah', 'subtotal')
                    ->withTimestamps();
    }
}

