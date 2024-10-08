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

class PaymentEventController extends Controller
{
    // Transaksi Berbayar
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'harga' => 'required|numeric',
            'email' => 'required|email',
            'no_telp' => 'required|string',
            'nama_lengkap' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'jenis_produk' => 'required|string',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
            'image_path' => 'nullable|string|max:255',
            'event_id' => 'required|exists:events,id', // Pastikan event_id harus ada
        ]);

        // Ambil data event berdasarkan event_id dari input
        $event = Event::findOrFail($validated['event_id']); // Mencari event berdasarkan id

        // Konversi harga ke integer
        $validated['harga'] = (int) $validated['harga'];

        \Log::info('Data yang sudah divalidasi: ', $validated);

        // Kirim POST request ke Xendit
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('XENDIT_API_KEY'),
        ])->post('https://xendit.zenmultimedia.co.id/api/invoice', [
            'amount' => $validated['harga'],
            'payer_email' => $validated['email'],
            'description' => $validated['nama_perusahaan'],
            'accountNumber' => $validated['no_telp'],
            'accountName' => $validated['nama_lengkap'],
        ]);

        // Debug: Cek respons dari API
        \Log::info('Xendit Response: ', $response->json());
        \Log::info('Xendit Response Status Code: ', [$response->status()]);
        \Log::info('Xendit Response Body: ', [$response->body()]);

        if ($response->successful()) {
            $responseData = $response->json();

            // Simpan data transaksi di sesi
            session(['transaction_data' => $responseData]);

            // Ambil external_id dan invoice_url dari responseData
            $external_id = $responseData['data']['external_id'];
            $invoice_url = $responseData['data']['invoice_url'];

            session(['invoice_url' => $invoice_url]);

            // Simpan data transaksi ke dalam tabel payment_events
            PaymentEvent::create([
                'event_id' => $event->id, // Ambil id dari objek event yang sudah dicari
                'harga' => $validated['harga'],
                'email' => $validated['email'],
                'no_telp' => $validated['no_telp'],
                'nama_lengkap' => $validated['nama_lengkap'],
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'jenis_produk' => $validated['jenis_produk'],
                'jabatan' => $validated['jabatan'],
                'alamat' => $validated['alamat'],
                'external_id' => $external_id,
                'keterangan' => 'PENDING',
                'image_path' => $request->input('image_path'),
            ]);

            $encryptedExternalId = encrypt($external_id);

            // Redirect ke rute 'transaksi.show' dengan external_id yang sudah terenkripsi
            return redirect()->route('transaksi.show', ['encrypted_external_id' => encrypt($external_id)]);
        }

        return redirect()->back()->with('error', 'Payment failed. Please try again.');
    }

    public function show($encrypted_external_id)
    {
        // Dekripsi external_id dari URL
        $external_id = decrypt($encrypted_external_id);

        // Cari data transaksi berdasarkan external_id yang sudah didekripsi
        $transactionData = PaymentEvent::where('external_id', $external_id)->first();

        if (!$transactionData) {
            return redirect()->back()->with('error', 'Transaction not found.');
        }

        // Enkripsi external_id untuk ditampilkan di URL atau keperluan lainnya
        $encryptedExternalId = encrypt($transactionData->external_id);

        // Ambil invoice URL dari session
        $invoice_url = session('invoice_url');

        // Kirim external_id yang sudah terenkripsi ke view
        return view('invoice.show', compact('transactionData', 'invoice_url', 'encryptedExternalId'));
    }

    // Transaksi Gratis
    public function freepayment(Request $request)
    {
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

        // Search Event By ID
        $event = Event::findOrFail($request->event_id);

        // Check Event quota, for -1 quota if  status_kuota not "unlimited"
        if ($event->status_quota !== 'unlimited') {
            if ($event->quota > 0) {
                $event->quota -= 1;
                $event->save();
            }
        }

        // Create unique code for Event Link Ticket
        $kodeUnik = Str::random(20);

        // Save Payment Data
        $paymentEvent = PaymentEvent::create($request->only(['event_id', 'nama_lengkap', 'jenis_produk', 'email', 'no_telp', 'jabatan', 'nama_perusahaan', 'alamat', 'harga']) + ['kode_invoice' => $kodeUnik]);

        // Validate data for Create Ticket
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

        // Create Ticket
        Ticket::create($ticketData);

        // Send a Email notification
        Mail::to($paymentEvent->email)->send(new PaymentEventMail($ticketData));

        // Enkripsi kode invoice untuk ditampilkan di tampilan
        $encryptedKode = encrypt($kodeUnik);

        // Show a invoice page
        return view('events.invoice', [
            'ticketData' => $ticketData,
            'kode' => $encryptedKode, // Mengirimkan kode yang sudah dienkripsi
            'success' => 'Data berhasil disimpan, kuota diperbarui, dan email telah dikirim.',
        ]);
    }

    // Delete Invoice
    public function destroy($id)
    {
        $paymentEvent = PaymentEvent::find($id);

        $paymentEvent->delete();

        return redirect()->route('admin.events.payments')->with('success', true)->with('toast', 'delete');
    }
}
