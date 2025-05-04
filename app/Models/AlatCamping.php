<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatCamping extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'stok',
        'harga_sewa',
    ];
    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }
    
}
