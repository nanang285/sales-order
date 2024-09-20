<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

class AbsenController extends Controller
{
    public function detail($id)
    {
        $breadcrumbTitle = 'Detail Absen';
        $employee = Employee::findOrFail($id);

        $absens = Absen::where('fingerprint_id', $employee->fingerprint_id)
            ->oldest()
            ->get();

        // Ini Untuk Menghitung total Jam Kerja & Absen Karyawan
        $totalMenit = 0;
        $jumlahKehadiran = $absens->count();

        foreach ($absens as $absen) {
            if ($absen->time_in && $absen->time_out) {
                $timeIn = new \DateTime($absen->time_in);
                $timeOut = new \DateTime($absen->time_out);

                $interval = $timeIn->diff($timeOut);
                $selisihMenit = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;

                $istirahatMulai = new \DateTime($timeIn->format('Y-m-d') . ' 12:00:00');
                $istirahatSelesai = new \DateTime($timeIn->format('Y-m-d') . ' 13:00:00');

                if ($timeIn <= $istirahatSelesai && $timeOut >= $istirahatMulai) {
                    $selisihMenit -= 60;
                }

                $totalMenit += $selisihMenit;
            }
        }

        $totalMenit = max($totalMenit, 0);

        $totalJam = floor($totalMenit / 60);
        $sisaMenit = $totalMenit % 60;

        $totalJamKerja = "{$totalJam} Jam {$sisaMenit} Menit";

        return view('admin.absen.detail-absen', compact('employee', 'absens', 'totalJamKerja', 'jumlahKehadiran', 'breadcrumbTitle'));
    }

    // PROSES PENERIMAAN  DATA DARI REQUEST FINGERPRINT/IOT
    public function handleData(Request $request)
    {
        $id = $request->input('id', 0);
        $timestamp = $request->input('time_stamp', date('Y-m-d H:i:s'));

        if (!Employee::where('fingerprint_id', $id)->exists()) {
            return response()->json(['message' => 'Error, ID fingerprint tidak terdaftar.'], 500);
        }

        $timestamp = explode(' ', $timestamp);

        $data = [
            'fingerprint_id' => $id, // isi fingerprint_id dengan id dari request
            'date' => $timestamp[0],
            'time' => $timestamp[1],
        ];

        // Log::info('data: ', ['data' => $data]);

        $request->validate([
            'id' => 'required|exists:employees,fingerprint_id',
            'time_stamp' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $fingerprint_id = $request->input('id');
        $date = $timestamp[0];
        $time = $timestamp[1];

        // Megnambil data dari tabel Attendance
        $attendances = Attendance::first();

        $timeInMin = '06:00:00'; // Absen masuk minimal
        $timeInMax = $attendances->time_in_max; // Absen masuk maksimal atau telat

        $lastAbsen = Absen::where('fingerprint_id', $fingerprint_id)->where('date', $date)->orderBy('time_in', 'desc')->first();

        if ($lastAbsen && Carbon::parse($lastAbsen->time_in)->diffInMinutes(Carbon::parse($time)) < 10) {
            return response()->json(['message' => 'Gagal, Anda sudah absen masuk sebelumnya'], 500);
        }

        $absen = Absen::where('fingerprint_id', $fingerprint_id)->where('date', $date)->first();

        if ($absen) {
            // if ($time < $timeOutMin) {
            //     return response()->json(['message' => 'Gagal, Waktu absen pulang belum terpenuhi'], 500);
            // }

            if ($absen->time_out) {
                return response()->json(['message' => 'Gagal, Absen hari ini telah terpenuhi'], 500);
            } else {
                $absen->time_out = $time;
            }
        } else {
            if ($time < $timeInMin) {
                return response()->json(['message' => ' Gagal, Waktu absen masuk minimal jam 06:00'], 500);
            }

            $keterangan = $time > $timeInMax ? 'Telat' : 'Hadir';

            $absen = new Absen();
            $absen->fingerprint_id = $fingerprint_id;
            $absen->date = $date;
            $absen->time_in = $time;
            $absen->keterangan = $keterangan;
        }

        $absen->save();

        return response()->json(
            [
                'message' => $absen->keterangan == 'Telat' ? 'Success, Absen berhasil, namun telat' : 'Success, Absen berhasil',
            ],
            201,
        );
    }
}
