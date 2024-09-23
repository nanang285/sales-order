<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VissionMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'list_items',
    ];

    protected $casts = [
        'list_items' => 'array',
    ];
}
