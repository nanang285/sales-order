<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\PaymentEvent;
use App\Models\FooterSection;
use App\Models\Event;
use App\Models\Ticket;
use App\Mail\PaymentEventMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class XenditCallbackController extends Controller
{
    // CALLBACK XENDIT
    public function handleCallback(Request $request)
    {
        // Ambil data dari Xendit
        $data = $request->all();
        \Log::info('Xendit Callback Data: ', $data);

        // Validasi external_id dan status
        if (!isset($data['data']['external_id']) || !isset($data['data']['status'])) {
            \Log::error('Missing external_id or status in Xendit callback data.', $data);
            return response()->json(['status' => 'failure', 'message' => 'Missing data'], 400);
        }

        // Cari PaymentEvent berdasarkan external_id
        $paymentEvent = PaymentEvent::where('external_id', $data['data']['external_id'])->first();

        // Jika PaymentEvent tidak ditemukan
        if (!$paymentEvent) {
            \Log::error('PaymentEvent not found for external_id: ' . $data['data']['external_id']);
            return response()->json(['status' => 'failure', 'message' => 'PaymentEvent not found'], 404);
        }

        // Simpan status pembayaran apapun yang diterima dari Xendit ke 'keterangan'
        $status = $data['data']['status'];
        $paymentEvent->keterangan = $status;

        // Simpan perubahan ke database
        $success = $paymentEvent->save();
        \Log::info('PaymentEvent saved: ', ['success' => $success]);

        // Buat tiket, jika statusnya 'PAID'
        if ($status === 'PAID') {
            $this->CreateTicket($data['data']['external_id']);
        }

        // Kirim respon berhasil ke Xendit
        return response()->json(['status' => 'success', 'message' => 'Payment status updated successfully.']);
    }

    public function CreateTicket($external_id)
    {
        // Cari Payment berdasarkan external_id
        $payment = PaymentEvent::where('external_id', $external_id)->first();

        // Jika Payment tidak ditemukan
        if (!$payment) {
            \Log::error('Payment not found for external_id: ' . $external_id);
            return response()->json(['status' => 'failure', 'message' => 'Payment not found'], 404);
        }

        // Cek apakah status pembayaran sudah berhasil
        if ($payment->keterangan !== 'PAID') {
            \Log::error('Payment is not marked as paid for external_id: ' . $external_id);
            return response()->json(['status' => 'failure', 'message' => 'Payment not yet completed'], 400);
        }

        $event = Event::find($payment->event_id);

        $ticketData = [
            'event_id' => $payment->event_id,
            'jenis_produk' => $payment->jenis_produk,
            'nama_lengkap' => $payment->nama_lengkap,
            'nama_perusahaan' => $payment->nama_perusahaan,
            'jabatan' => $payment->jabatan,
            'email' => $payment->email,
            'alamat' => $payment->alamat,
            'no_telp' => $payment->no_telp,
            'harga' => $payment->harga,
            'kode_invoice' => $payment->external_id,
            'image_path' => $event ? $event->image_path : null,
            'waktu' => $payment->waktu,
            'type' => 'berbayar',
        ];

        // Create Ticket
        Ticket::create($ticketData);

        // Send a Email notification
        Mail::to($payment->email)->send(new PaymentEventMail($ticketData));

        // Show a invoice pages
        return view('events.invoice', [
            'ticketData' => $ticketData,
            'kode' => $external_id,
            'success' => 'Data berhasil disimpan, kuota diperbarui, dan email telah dikirim.',
        ]);

        \Log::info('Tiket created successfully for external_id: ' . $external_id);
    }
}
