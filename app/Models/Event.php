<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'events';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'judul',
        'slug',
        'description',
        'image_path',
        'waktu',
        'type',
        'harga',
        'pilihan_sesi',
        'kategori',
        'status_quota',
        'quota',
        'lokasi',
    ];

}
