<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\PaymentEvent;
use App\Models\Event;
use App\Models\Ticket;
use App\Mail\PaymentEventMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentEventController extends Controller
{
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
        ]);

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

            // Ambil external_id dari responseData
            $external_id = $responseData['data']['external_id']; // Ganti sesuai struktur data Anda

            PaymentEvent::create([
                'harga' => $validated['harga'],
                'email' => $validated['email'],
                'no_telp' => $validated['no_telp'],
                'nama_lengkap' => $validated['nama_lengkap'],
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'jenis_produk' => $validated['jenis_produk'],
                'jabatan' => $validated['jabatan'],
                'alamat' => $validated['alamat'],
                'external_id' => $external_id,
                'keterangan' => 'Sedang Di Proses',
            ]);

            // Redirect ke rute 'transaksi.show' dengan external_id
            return redirect()->route('transaksi.show', ['external_id' => $external_id]);
        }

        return redirect()->back()->with('error', 'Payment failed. Please try again.');
    }

    public function show(Request $request, $external_id)
    {
        // Cek apakah ada data transaksi di sesi
        $transactionData = $request->session()->get('transaction_data');

        // Tampilkan view dengan data transaksi
        return view('invoice.show', compact('transactionData'));
    }

    // CALLBACK XENDIT
    public function handleCallback(Request $request)
    {
        // Ambil data dari Xendit
        $data = $request->all();

        \Log::info('Xendit Callback Data: ', $data);

        $paymentEvent = PaymentEvent::where('external_id', $data['data']['external_id'])->first();

        if ($paymentEvent) {
            $status = $data['data']['status'];
            $paymentEvent->keterangan = $status === 'PAID' ? 'Pembayaran Berhasil' : 'Pembayaran Gagal';
            $paymentEvent->save();

            // // Kirim email konfirmasi jika pembayaran berhasil
            // if ($status === 'PAID') {
            //     Mail::to($paymentEvent->email)->send(new PaymentEventMail($paymentEvent));
            // }

            // Kembalikan response sukses ke Xendit
            return response()->json(['status' => 'success'], 200);
        }

        // Jika tidak ditemukan, kembalikan response gagal
        return response()->json(['status' => 'failure'], 404);
    }
}
