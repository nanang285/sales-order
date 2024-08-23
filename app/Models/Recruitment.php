<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Recruitment extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'email',
        'name',
        'nik',
        'address',
        'phone_number',
        'study',
        'position',
        'onsite',
        'test',
        'agree',
        'salary',
        'portfolio',
        'file_path',
        'stage1',
        'stage2',
        'stage3',
        'stage4',
        'failed_stage',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
