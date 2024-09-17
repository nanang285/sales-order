<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Employee;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function detail($id)
    {
        $breadcrumbTitle = 'Detail Absen';

        // Untuk Mnampilkan Data karyawan yang di pilih by $id
        $employee = Employee::findOrFail($id);

        // Mengambil semua kehadiran untuk karyawan yg di pilih
        $absens = Absen::where('fingerprint_id', $employee->fingerprint_id)
            ->oldest()
            ->get();

        // untuk mnghitung jam absen karyawan
        $totalMenit = 0;
        $jumlahKehadiran = $absens->count();

        foreach ($absens as $absen) {
            if ($absen->time_in && $absen->time_out) {
                $timeIn = new \DateTime($absen->time_in);
                $timeOut = new \DateTime($absen->time_out);

                $interval = $timeIn->diff($timeOut);
                $totalMenit += $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
            }
        }

        $totalJam = floor($totalMenit / 60);
        $sisaMenit = $totalMenit % 60;

        $totalJamKerja = "{$totalJam} Jam {$sisaMenit} Menit";

        return view('admin.absen.detail-absen', compact('employee', 'absens', 'totalJamKerja', 'jumlahKehadiran', 'breadcrumbTitle'));
    }

    public function HandleData(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required|exists:employees,fingerprint_id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
        ]);

        $fingerprint_id = $request->input('fingerprint_id');
        $date = $request->input('date');
        $time = $request->input('time');

        // MEmbatasi Waktu Absen Pagi Minimal Jam 6:00 Maksimal Jm 10:00
        $timeInMin = '06:00:00';
        $timeInMax = '10:00:00';

        // Membatasi Waktu Absen Pulang Minimal Jam 16:00
        $timeOutMin = '16:00:00';

        $lastAbsen = Absen::where('fingerprint_id', $fingerprint_id)->where('date', $date)->orderBy('time_in', 'desc')->first();

        if ($lastAbsen && Carbon::parse($lastAbsen->time_in)->diffInMinutes(Carbon::parse($time)) < 60) {
            return response()->json(['message' => 'Anda sudah absen masuk Sebelumya'], 400);
        }

        $absen = Absen::where('fingerprint_id', $fingerprint_id)->where('date', $date)->first();

        if ($absen) {
            if ($time < $timeOutMin) {
                return response()->json(['message' => 'Waktu absen pulang minimal jam 16:00'], 400);
            }

            if ($absen->time_out) {
                return response()->json(['message' => 'Absen hari ini telah terpenuhi'], 400);
            } else {
                $absen->time_out = $time;
            }
        } else {
            if ($time < $timeInMin) {
                return response()->json(['message' => 'Waktu absen masuk minimal jam 06:00'], 400);
            }

            if ($time > $timeInMax) {
                $keterangan = 'Telat';
            } else {
                $keterangan = 'Hadir';
            }

            $absen = new Absen();
            $absen->fingerprint_id = $fingerprint_id;
            $absen->date = $date;
            $absen->time_in = $time;
            $absen->keterangan = $keterangan;
        }

        $absen->save();

        // Absen Melebihi Jam 10:00 dan di Anggap telat Masuk.
        if ($absen->keterangan == 'Telat') {
            return response()->json(['message' => 'Absen berhasil, Namun Telat'], 201);
        }

        return response()->json(['message' => 'Absen berhasil'], 201);
    }
}
