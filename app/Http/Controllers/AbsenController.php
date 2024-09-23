<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

use App\Models\Absen;
use App\Models\Employee;
use App\Models\Attendance;


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
        $request->validate([
            'id' => 'required',
            'time_stamp' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $id = $request->input('id', 0);
        $timestamp = $request->input('time_stamp', date('Y-m-d H:i:s'));

        // Cek apakah ID fingerprint terdaftar
        if (!Employee::where('fingerprint_id', $id)->exists()) {
            return response()->json(['message' => 'Error, ID fingerprint tidak terdaftar.'], 500);
        }

        $timestamp = explode(' ', $timestamp);

        // Log data (DEBUG)
        $data = [
            'fingerprint_id' => $id,
            'date' => $timestamp[0],
            'time' => $timestamp[1],
        ];

        Log::info('Data absen diterima:', ['data' => $data]);

        $attendances = Attendance::first();
        if (!$attendances) {
            return response()->json(['message' => 'Data attendance tidak tersedia.'], 500);
        }

        $timeInMin = '06:00:00';
        $timeInMax = $attendances->time_in_max;

        
        Log::info('Time In Max', ['time_in_max' => $timeInMax]);

        $lastAbsen = Absen::where('fingerprint_id', $id)
            ->where('date', $timestamp[0])
            ->orderBy('time_in', 'desc')
            ->first();

        if ($lastAbsen && Carbon::parse($lastAbsen->time_in)->diffInMinutes(Carbon::parse($timestamp[1])) < 10) {
            return response()->json(['message' => 'Gagal, Anda sudah absen masuk sebelumnya'], 500);
        }

        $absen = Absen::where('fingerprint_id', $id)
            ->where('date', $timestamp[0])
            ->first();

        if ($absen) {
            if ($absen->time_out) {
                return response()->json(['message' => 'Gagal, Absen hari ini telah terpenuhi'], 500);
            } else {
                $absen->time_out = $timestamp[1];
                Log::info('Absen keluar berhasil diupdate.', ['time_out' => $timestamp[1]]);
            }
        } else {
            if ($timestamp[1] < $timeInMin) {
                return response()->json(['message' => 'Gagal, Waktu absen masuk minimal jam 06:00'], 500);
            }

            $keterangan = $timestamp[1] > $timeInMax ? 'Telat' : 'Hadir';

            $absen = new Absen();
            $absen->fingerprint_id = $id;
            $absen->date = $timestamp[0];
            $absen->time_in = $timestamp[1];
            $absen->keterangan = $keterangan;

            Log::info('Absen masuk berhasil.', [
                'fingerprint_id' => $id,
                'date' => $timestamp[0],
                'time_in' => $timestamp[1],
                'keterangan' => $keterangan,
            ]);
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
