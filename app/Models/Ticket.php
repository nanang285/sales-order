<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'jenis_produk',     
        'nama_lengkap',
        'nama_perusahaan',
        'jabatan',
        'email',
        'no_telp',
        'harga',
        'kode_invoice',
        'image_path',
        'waktu',
        'type',             
        'alamat',             
    ];
    

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
