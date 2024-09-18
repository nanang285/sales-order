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

        // Menampilkan Data karyawan yang dipilih berdasarkan $id
        $employee = Employee::findOrFail($id);

        // Megnambil data dari tabel Attendance
        // $attendances = Attendance::firstOrFail();

        // Mengambil semua kehadiran untuk karyawan yang dipilih
        $absens = Absen::where('fingerprint_id', $employee->fingerprint_id)
            ->oldest()
            ->get();

        // Menghitung jam absen karyawan
        $totalMenit = 0;
        $jumlahKehadiran = $absens->count();

        foreach ($absens as $absen) {
            if ($absen->time_in && $absen->time_out) {
                $timeIn = new \DateTime($absen->time_in);
                $timeOut = new \DateTime($absen->time_out);

                $JamMasuk = new \DateTime($timeIn->format('Y-m-d') . '09:00:00');

                $JamKeluar = new \DateTime($timeIn->format('Y-m-d') . '18:00:00');

                if ($timeIn < $JamMasuk) {
                    $timeIn = $JamMasuk;
                }

                if ($timeOut > $JamKeluar) {
                    $interval = $timeIn->diff($JamKeluar);
                    $totalMenit += $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
                } else {
                    $interval = $timeIn->diff($timeOut);
                    $totalMenit += $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
                }
            }
        }

        $totalMenit -= 60;

        $totalMenit = max($totalMenit, 0);

        $totalJam = floor($totalMenit / 60);
        $sisaMenit = $totalMenit % 60;

        $totalJamKerja = "{$totalJam} Jam {$sisaMenit} Menit";

        return view('admin.absen.detail-absen', compact('employee', 'absens', 'totalJamKerja', 'jumlahKehadiran', 'breadcrumbTitle'));
    }

    // PROSES PENERIMAAN  DATA DARI REQUEST
    public function handleData(Request $request)
    {
        // ini validasi id request
        $id = $request->input('id', 0);
        $timestamp = $request->input('time_stamp', date('Y-m-d H:i:s'));

        // Cek apakah ID yang diterima terdaftar atau tidak
        if (!Employee::where('fingerprint_id', $id)->exists()) {
            return response()->json(['message' => 'ID fingerprint tidak dikenali.'], 500);
        }

        $timestamp = explode(' ', $timestamp);

        $data = [
            'fingerprint_id' => $id, // isi fingerprint_id dengan id dari request
            'date' => $timestamp[0],
            'time' => $timestamp[1],
        ];

        // Log::info('data: ', ['data' => $data]);

        // Bgaian Request data ke database
        $request->validate([
            'id' => 'required|exists:employees,fingerprint_id',
            'time_stamp' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $fingerprint_id = $request->input('id');
        $date = $timestamp[0];
        $time = $timestamp[1];

        // Megnambil data dari tabel Attendance
        $attendances = Attendance::firstOrFail();

        $timeInMin = '06:00:00'; // Absen masuk minimal
        $timeInMax = $attendances->time_in_max; // Absen masuk maksimal atau telat
        // $timeOutMin = $attendances->time_out_min; // Absen keluar minimal

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
