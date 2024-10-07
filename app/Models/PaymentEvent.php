<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

class PaymentEvent extends Model
{
    protected $table = 'payment_events';
    
    protected $fillable = [
        'nama_lengkap','jenis_produk', 'email', 'no_telp', 'jabatan', 'nama_perusahaan', 'alamat', 'harga', 'keterangan', 'external_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
