<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'jam_masuk',
        'jam_masuk_maksimal',
        'jam_keluar',
        'jam_keluar_minimal',
        'fingerprint_id'
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'division' => 'string',
        'role' => 'string',
        'fingerprint_id' => 'integer'
    ];

    public function scopeSearch(Builder $query, $search)
    {
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        return $query;
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'fingerprint_id', 'fingerprint_id');
    }

}