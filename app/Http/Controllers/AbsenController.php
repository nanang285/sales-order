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
    public function detail($id, Request $request)
    {
        $breadcrumbTitle = 'Detail Absen';
        $employee = Employee::findOrFail($id);

        $bulan = $request->input('bulan', now()->format('Y-m'));
        $bulanNumber = date('m', strtotime($bulan));
        $tahun = date('Y', strtotime($bulan));

        $absens = Absen::where('fingerprint_id', $employee->fingerprint_id)
            ->whereMonth('date', $bulanNumber)
            ->whereYear('date', $tahun)
            ->orderBy('date', 'asc')
            ->get();

        $totalMenit = 0;
        $absensiHarian = [];
        $jumlahKehadiran = 0;

        foreach ($absens as $absen) {
            $timeIn = $absen->time_in ? new \DateTime($absen->time_in) : null;
            $timeOut = $absen->time_out ? new \DateTime($absen->time_out) : null;

            if ($timeIn) {
                $startTime = new \DateTime($timeIn->format('Y-m-d') . ' ' . $employee->jam_masuk);
                $endTime = new \DateTime($timeIn->format('Y-m-d') . ' ' . $employee->jam_keluar);
                $jamMasukMaksimal = new \DateTime($timeIn->format('Y-m-d') . ' ' . $employee->jam_masuk_maksimal);
                $jamKeluarMinimal = new \DateTime($timeIn->format('Y-m-d') . ' ' . $employee->jam_keluar_minimal);

                $actualStartTime = max($timeIn, $startTime);

                if ($timeOut) {
                    $actualEndTime = min($timeOut, $endTime);

                    $interval = $actualStartTime->diff($actualEndTime);
                    $selisihMenit = $interval->h * 60 + $interval->i;

                    $istirahatMulai = new \DateTime($timeIn->format('Y-m-d') . ' 12:00:00');
                    $istirahatSelesai = new \DateTime($timeIn->format('Y-m-d') . ' 13:00:00');
                    if ($actualStartTime <= $istirahatSelesai && $actualEndTime >= $istirahatMulai) {
                        $selisihMenit -= 60;
                    }

                    if ($timeIn > $jamMasukMaksimal) {
                        $keterangan = 'Telat';
                    } elseif ($timeOut < $jamKeluarMinimal) {
                        $keterangan = 'Hadir, Kurang terpenuhi';
                    } else {
                        $keterangan = 'Hadir';
                    }

                    // Tambahkan ke absensi harian
                    $absensiHarian[] = [
                        'tanggal' => $absen->date,
                        'time_in' => $timeIn->format('H:i:s'),
                        'time_out' => $timeOut ? $timeOut->format('H:i:s') : null,
                        'keterangan' => $keterangan,
                        'jam_kerja' => floor($selisihMenit / 60) . ' Jam ' . $selisihMenit % 60 . ' Menit',
                    ];

                    $totalMenit += max($selisihMenit, 0);
                } else {
                    $absensiHarian[] = [
                        'tanggal' => $absen->date,
                        'time_in' => $timeIn->format('H:i:s'),
                        'time_out' => null,
                        'keterangan' => 'Belum Absen Pulang',
                        'jam_kerja' => 'Belum Dihitung',
                    ];
                }

                $jumlahKehadiran++;
            }
        }

        $totalMenit = max($totalMenit, 0);
        $totalJam = floor($totalMenit / 60);
        $sisaMenit = $totalMenit % 60;
        $totalJamKerja = "{$totalJam} Jam {$sisaMenit} Menit";

        return view('admin.absen.detail-absen', compact('breadcrumbTitle', 'employee', 'absensiHarian', 'totalJamKerja', 'jumlahKehadiran', 'bulan'));
    }

    // PROSES PENERIMAAN DATA DARI REQUEST FINGERPRINT/IOT
    public function handleData(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'time_stamp' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $id = $request->input('id', 0);
        $timestamp = $request->input('time_stamp', date('Y-m-d H:i:s'));

        // Cek Fingerprint_id apakah ada
        if (!Employee::where('fingerprint_id', $id)->exists()) {
            return response()->json(['message' => 'Error, ID fingerprint tidak terdaftar.'], 500);
        }

        $timestamp = explode(' ', $timestamp);
        Log::info('Data absen diterima:', ['fingerprint_id' => $id, 'date' => $timestamp[0], 'time' => $timestamp[1]]);

        $timeOutMin = '13:00:00';
        $timeOutMax = '22:00:00';

        Log::info('Time Out Min', ['time_out_min' => $timeOutMin]);
        Log::info('Time Out Max', ['time_out_max' => $timeOutMax]);

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
            if ($timestamp[1] < $timeOutMin) {
                return response()->json(['message' => 'Error, Absen pulang belum dimulai.'], 500);
            }

            if ($absen->time_out) {
                return response()->json(['message' => 'Gagal, Absen hari ini telah terpenuhi'], 500);
            } else {
                if ($timestamp[1] > $timeOutMax) {
                    return response()->json(['message' => 'Error, Waktu absen pulang sudah terlewati.'], 500);
                }

                $absen->time_out = $timestamp[1];
                Log::info('Absen keluar berhasil diupdate.', ['time_out' => $timestamp[1]]);
                $absen->save();
                return response()->json(['message' => 'Absen pulang berhasil'], 201);
            }
        } else {
            $timeInMin = '06:00:00';
            $timeInMax = '12:00:00';

            if ($timestamp[1] > $timeInMax) {
                return response()->json(['message' => 'Error, Waktu absen masuk sudah terlewati.'], 500);
            }

            if ($timestamp[1] < $timeInMin) {
                return response()->json(['message' => 'Gagal, Waktu absen masuk belum dimulai'], 500);
            }

            $keterangan = 'Hadir';

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
            $absen->save();
            return response()->json(['message' => 'Absen masuk berhasil'], 201);
        }
    }
}
