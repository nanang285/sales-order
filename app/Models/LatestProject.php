<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'button_link',
        'image_path',
    ];
}
