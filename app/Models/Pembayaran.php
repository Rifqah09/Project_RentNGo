<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewaan_id',
        'total',
        'payment_date',
        'payment_method',
        'status',
    ];
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class);
    }
    
}
