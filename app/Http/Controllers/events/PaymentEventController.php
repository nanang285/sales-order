<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\PaymentEvent;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Str;
use App\Mail\PaymentEventMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PaymentEventController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'jenis_produk' => 'required|string',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'harga' => 'required|numeric',
            'event_id' => 'required|exists:events,id',
            'image_path' => 'nullable|string|max:255',
            'waktu' => 'nullable|date',
            'type' => 'nullable|string|max:255',
        ]);

        // Cari event berdasarkan ID
        $event = Event::findOrFail($request->event_id);

        // Cek kuota event
        if (!$event || $event->quota < 1) {
            return redirect()
                ->back()
                ->withErrors(['quota' => 'Kuota tidak tersedia.']);
        }

        // Buat kode unik untuk invoice
        $kodeUnik = Str::random(20);

        // Simpan data pembayaran
        $paymentEvent = PaymentEvent::create($request->only([
            'nama_lengkap', 'jenis_produk', 'email', 'no_telp', 
            'jabatan', 'nama_perusahaan', 'alamat', 'harga'
        ]) + ['kode_invoice' => $kodeUnik]);

        // Kurangi kuota event
        $event->quota -= 1;
        $event->save();

        // Siapkan data tiket
        $ticketData = [
            'event_id' => $event->id,
            'jenis_produk' => $paymentEvent->jenis_produk,
            'nama_lengkap' => $paymentEvent->nama_lengkap,
            'nama_perusahaan' => $paymentEvent->nama_perusahaan,
            'jabatan' => $paymentEvent->jabatan,
            'email' => $paymentEvent->email,
            'alamat' => $paymentEvent->alamat,
            'no_telp' => $paymentEvent->no_telp,
            'harga' => $paymentEvent->harga,
            'kode_invoice' => $kodeUnik,
            'image_path' => $request->input('image_path'),
            'waktu' => $request->input('waktu'),
            'type' => $request->input('type'),
        ];

        // Buat tiket
        Ticket::create($ticketData);

        // Kirim email konfirmasi
        Mail::to($paymentEvent->email)->send(new PaymentEventMail($ticketData));

        // Tampilkan halaman invoice
        return view('events.invoice', [
            'ticketData' => $ticketData,
            'kode' => $kode,
            'success' => 'Data berhasil disimpan, kuota diperbarui, dan email telah dikirim.',
        ]);
    }
}
