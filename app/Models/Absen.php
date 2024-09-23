<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absens';
    protected $fillable = ['id', 'date', 'time_in', 'time_out', 'keterangan', 'fingerprint_id'];

    public function user()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getTimeInAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    public function getTimeOutAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('H:i:s') : null;
    }

    public function getDurationAttribute()
    {
        if ($this->time_in && $this->time_out) {
            $timeIn = Carbon::parse($this->time_in);
            $timeOut = Carbon::parse($this->time_out);
            return $timeIn->diffInHours($timeOut) . ' jam';
        }
        return null;
    }

    public function scopeFilterByMonth($query, $month)
    {
        return $query->whereYear('date', $month->year)->whereMonth('date', $month->month);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'fingerprint_id', 'fingerprint_id');
    }
}
