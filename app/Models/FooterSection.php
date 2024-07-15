<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat',
        'no_telp',
        'email',
        'sosmed_1',
        'sosmed_2',
        'sosmed_3',
    ];
}
