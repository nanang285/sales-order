@extends('layouts.main')
@section('container')
    @include('components.preloader')

    <div class="flex items-center justify-center min-h-screen bg-gray-100 relative">
        @if (session()->has('invoice_url'))
            <a href="{{ route('events') }}" onclick="history.back()"
                class="fixed top-[16px] bg-blue-500 z-10 text-white font-semibold text-base py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
                <i class="fa-solid fa-left-long"></i> Kembali
            </a>

            <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow border my-6 relative" id="invoice">
                <div id="loading"
                    class="hidden absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                    <div class="text-white">Loading...</div>
                </div>

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
                                <p>{{ $transactionData->external_id }}</p>
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

                @if (trim($transactionData->keterangan) === 'PAID')
                    <div class="pt-4 text-base font-semibold text-gray-500 text-center">
                        Cek email untuk detail atau Klik <span class="text-green-500">Dapatkan Tiket</span> Anda.
                    </div>
                @endif

                <div class="mt-8 flex justify-center">
                    @if (trim($transactionData->keterangan) === 'PAID')
                        <a href="{{ route('event.ticket', ['kode' => $external_id]) }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                            Dapatkan Tiket
                        </a>
                    @elseif (trim($transactionData->keterangan) === 'EXPIRED' || trim($transactionData->keterangan) === 'FAILED')
                        <p class="text-red-500 font-bold">Transaksi Expired atau Gagal</p>
                    @else
                        <a href="{{ session('invoice_url') }}" target="_blank"
                            class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-1.5 px-3 rounded-lg"
                            id="payButton">
                            Bayar
                        </a>
                    @endif
                </div>

                <div class="border-t-2 pt-4 text-sm font-semibold text-red-500 text-center mt-16">
                    Tolong untuk tidak menutup atau close halaman jika pembayaran belum update.
                </div>
            </div>
        @else
            <p>Data transaksi tidak ditemukan.</p>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#payButton').on('click', function(e) {
                $('#loading').removeClass('hidden');

                $('body').css('pointer-events', 'none');
                $('#payButton').prop('disabled', true);

                setTimeout(function() {

                    var url = $('#payButton').attr('href');
                    window.open(url, '_blank');
                }, 1000);

                e.preventDefault();
            });

            $(window).on('beforeunload', function() {
                return "Anda yakin ingin meninggalkan halaman ini?";
            });

            $(document).on('contextmenu', function(e) {
                e.preventDefault();
            });
        });
    </script>


@endsection
