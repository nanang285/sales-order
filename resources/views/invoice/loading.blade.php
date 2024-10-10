@extends('layouts.main')
@section('container')
    <div id="loading" class="absolute inset-0 bg-gray-900 bg-opacity-90 flex items-center justify-center z-50">
        <div class="absolute animate-spin rounded-full h-28 w-28 border-t-4 border-b-4 border-blue-500"></div>
        <img src="{{ asset('favicon.ico') }}" class="rounded-full h-20 w-20">
    </div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 relative">
        @if (session()->has('invoice_url'))
            <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow border my-6 relative" id="invoice">
                <div class="grid grid-cols-2 items-center mb-4">
                    <div>
                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" class="w-44">
                    </div>
                    <div class="text-right">
                        <p class="text-gray-500 font-semibold text-base">Created By</p>
                        <p class="text-gray-500 text-sm">PT. ZEN MULTIMEDIA INDONESIA</p>
                    </div>
                </div>
                <hr>
                <div class="grid items-center mt-4">
                    <div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold text-gray-600 mb-4">Invoice data:</p>
                            <div class="text-right text-gray-800 text-lg font-bold">
                                <p></p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-gray-700 font-semibold text-base">
                                <p>Email</p>
                                <p>Nama Lengkap </p>
                                <p>Perusahaan </p>
                                <p class="mb-4">Jabatan</p>
                                <p>Proses Transaksi </p>
                            </div>
                            <div class="text-gray-500 font-semibold text-base text-right">
                                <p>{{ $transactionData->email }}</p>
                                <p>{{ $transactionData->nama_lengkap }}</p>
                                <p>{{ $transactionData->nama_perusahaan }}</p>
                                <p class="mb-4">{{ $transactionData->jabatan }}</p>
                                <p class="mb-4">{{ $transactionData->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mx-4 mt-8 flow-root sm:mx-0">
                    <table class="min-w-full">
                        <colgroup>
                            <col class="w-full sm:w-1/2">
                            <col class="sm:w-1/6">
                        </colgroup>
                        <thead class="border-b pb-2 border-gray-300 text-gray-900">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-lg font-semibold text-gray-900 sm:pl-0">Jenis
                                    Produk</th>
                                <th scope="col"
                                    class="py-3.5 pl-3 pr-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">Harga
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-gray-200">
                                <td class="max-w-full py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-semibold text-sm text-gray-900">
                                        <p>1 x {{ $transactionData->jenis_produk }}</p>
                                    </div>
                                </td>
                                <td class="py-5 pl-3 pr-4 text-right text-base font-bold text-gray-500 sm:pr-0">Rp
                                    {{ number_format($transactionData->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td scope="row" class="pl-3 pr-3 pt-4 text-left text-base font-bold text-gray-900">Total
                                </td>
                                <td class="pl-3 pr-4 pt-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">Rp
                                    {{ number_format($transactionData->harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="border-t-2 pt-4 text-sm font-semibold text-red-500 text-center mt-16">
                    Tolong untuk tidak menutup atau close halaman jika pembayaran belum update.
                </div>
            </div>
        @else
            <p>Data transaksi tidak ditemukan.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function checkPaymentStatus() {
                if ('{{ $transactionData->keterangan }}' !== 'PENDING') {
                    var encryptedExternalId = '{{ encrypt($transactionData->external_id) }}';
                    window.location.href =
                        '{{ route('transaksi.show', ['encrypted_external_id' => '__encrypted_external_id__']) }}'
                        .replace('__encrypted_external_id__', encryptedExternalId);
                } else {
                    $.ajax({
                        url: '{{ route('event.loading', ['kode' => $transactionData->external_id]) }}',
                        type: 'GET',
                        success: function(data) {
                            console.log('Status pembayaran:', data.status);
                        },
                        error: function() {
                            console.error('Error checking payment status');
                        }
                    });
                }
            }

            setInterval(function() {
                checkPaymentStatus();
                setTimeout(function() {
                    window.location.reload();
                }, 5000);
            }, 1000);
        });
    </script>
@endsection
