<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'division',
        'role',
        'fingerprint_id'
    ];

    protected $casts = [
        'id' => 'string',
        'division' => 'string',
        'role' => 'string',
        'fingerprint_id' => 'integer'
    ];
}
