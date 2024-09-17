<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens'; // Nama tabel dalam database
    protected $fillable = ['id', 'date', 'time_in', 'time_out', 'keterangan', 'fingerprint_id'];

    // Mendefinisikan relasi antara Absen dengan User (Assuming User model exists)
    public function user()
    {
        return $this->belongsTo(Employee::class);
    }

    // Mutator untuk format waktu in (time_in) agar lebih mudah dikelola
    public function getTimeInAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    // Mutator untuk format waktu out (time_out)
    public function getTimeOutAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('H:i:s') : null;
    }

    // Menambahkan accessor untuk menghitung durasi jika ada time_out
    public function getDurationAttribute()
    {
        if ($this->time_in && $this->time_out) {
            $timeIn = Carbon::parse($this->time_in);
            $timeOut = Carbon::parse($this->time_out);
            return $timeIn->diffInHours($timeOut) . ' jam';
        }
        return null;
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'fingerprint_id', 'fingerprint_id');
    }
}
