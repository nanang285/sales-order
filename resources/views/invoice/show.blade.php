@extends('layouts.main')
@section('container')
    <div id="loading" class="hidden fixed inset-0 bg-gray-900 bg-opacity-90 flex items-center justify-center z-50">
        <div class="absolute animate-spin rounded-full h-28 w-28 border-t-4 border-b-4 border-blue-500"></div>
        <img src="{{ asset('favicon.ico') }}" class="rounded-full h-20 w-20">
    </div>


    <div class="bg-fixed bg-cover bg-no-repeat">
        <div class="relative bg-opacity-90">
            <section class="mx-auto max-w-screen-full lg:px-6 mb-8">
                <div class="container mx-auto px-4 sm:px-6 lg:px-10">
                    @if (session()->has('invoice_url'))
                        <a href="{{route('events')}}"
                            class="flex flex-wrap px-3 py-2.5 md:px-5 md:py-3 my-6 text-gray-700 border max-w-40 border-gray-200 rounded-lg bg-white shadow-sm"
                            aria-label="Breadcrumb">
                            <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <p href="" class="text-sm font-bold text-gray-700 hover:text-blue-600">
                                        <i class="fa-solid fa-chevron-left mx-1"></i>
                                        Kembali
                                    </p>
                                </li>
                            </ol>
                        </a>
                        <div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow border my-6 relative" id="invoice">

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
                                                class="py-3.5 pl-4 pr-3 text-left text-lg font-semibold text-gray-900 sm:pl-0">
                                                Jenis
                                                Produk</th>
                                            <th scope="col"
                                                class="py-3.5 pl-3 pr-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">
                                                Harga
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-gray-200">
                                            <td class="max-w-full py-5 pl-4 pr-3 text-sm sm:pl-0">
                                                <div class="font-semibold text-sm text-gray-900">
                                                    <p>{{ $transactionData->jenis_produk }}</p>
                                                </div>
                                            </td>
                                            <td class="py-5 pl-3 pr-4 text-right text-base font-bold text-gray-500 sm:pr-0">
                                                Rp
                                                {{ number_format($transactionData->harga, 0, ',', '.') }}</td>
                                        </tr>

                                        <tr>
                                            <td scope="row"
                                                class="pl-3 pr-3 pt-4 text-left text-base font-bold text-gray-900">Total
                                            </td>
                                            <td
                                                class="pl-3 pr-4 pt-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">
                                                Rp
                                                {{ number_format($transactionData->harga, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @if (trim($transactionData->keterangan) === 'PAID')
                                <div class="pt-4 text-base font-semibold text-gray-500 text-center">
                                    Cek email untuk detail atau Klik <span class="text-green-500">Dapatkan Tiket</span>
                                    Anda.
                                </div>
                            @endif

                            <div class="mt-8 flex justify-center">
                                @if (trim($transactionData->keterangan) === 'PAID')
                                    <a href="{{ route('event.ticket', ['kode' => $encryptedExternalId]) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-semibold text-base py-1.5 px-2 md:py-2 md:px-4 rounded-lg">
                                        Dapatkan Tiket
                                    </a>
                                @elseif (trim($transactionData->keterangan) === 'EXPIRED' || trim($transactionData->keterangan) === 'FAILED')
                                    <p class="text-red-500 font-bold">Transaksi Expired atau Gagal</p>
                                @else
                                    <a href="{{ session('invoice_url') }}" target="_blank"
                                        class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-1.5 px-3 rounded-lg"
                                        id="payButton" data-kode="{{ $transactionData->external_id }}">
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
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function showLoading() {
                $('#loading').removeClass('hidden');
            }

            $('#payButton').on('click', function(e) {
                e.preventDefault();
                showLoading();

                var kodeValue = $(this).data('kode');

                var url = $(this).attr('href');
                window.open(url, '_blank');

                setTimeout(function() {
                    window.location.href = '{{ route('event.loading', ['kode' => '__kode__']) }}'
                        .replace('__kode__', kodeValue);

                    window.history.replaceState(null, '', window.location.href);
                }, 2000);
            });

            window.onbeforeunload = function() {
                showLoading();
            };
        });
    </script>

@endsection
