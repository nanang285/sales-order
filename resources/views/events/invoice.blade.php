@extends('layouts.main')
@section('container')
    @include('components.preloader')

    @if ($ticketData)
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow border my-6" id="invoice">
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
                            <p class="font-bold text-gray-600 mb-4 mt-2">Invoice data:</p>
                            <div class="text-right text-gray-800 text-lg font-bold">
                                <p>{{ $ticketData['nama_lengkap'] }}</p>
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
                                <p>{{ $ticketData['email'] }}</p>
                                <p>{{ $ticketData['nama_lengkap'] }}</p>
                                <p>{{ $ticketData['nama_perusahaan'] }}</p>
                                <p class="mb-4">{{ $ticketData['jabatan'] }}</p>
                                <p class="mb-4">PAID</p>
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
                        <thead class="pb-2 border-gray-300 text-gray-900">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-lg font-semibold text-gray-900 sm:pl-0">Jenis
                                    Produk</th>
                                <th scope="col"
                                    class="py-3.5 pl-3 pr-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">Harga
                                </th>
                            </tr>
                        </thead>
                        <hr>
                        <tbody>
                            <tr class="border-gray-200 ">
                                <td class="max-w-full py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-semibold text-sm text-gray-900">
                                        <p>1 x {{ $ticketData['jenis_produk'] }}</p>
                                    </div>
                                </td>
                                <td class="py-5 pl-3 pr-4 text-right text-base font-bold text-gray-500 sm:pr-0">Rp
                                    {{ number_format($ticketData['harga'], 0, ',', '.') }}</td>
                            </tr>

                            <tr>
                                <td class="pl-3 pr-3 pt-4 text-left text-base font-bold text-gray-900">Total</td>
                                <td class="pl-3 pr-4 pt-4 text-right text-lg font-semibold text-gray-900 sm:pr-0">Rp
                                    {{ number_format($ticketData['harga'], 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="mt-3">
                <div class="pt-4 text-base font-semibold text-gray-500 text-center">
                    Cek email untuk detail transaksi atau Klik <span class="text-green-500">Dapatkan Tiket</span> Anda.
                </div>

                <div class=" mt-8 flex justify-center">
                    <a href="{{ route('event.ticket', ['kode' => $kode]) }}" class="bg-green-500 hover:bg-green-700 text-base text-white font-bold py-1.5 px-3 rounded-lg">
                        Dapatkan Tiket
                    </a>
                </div>

                <div class="border-t-2 pt-4 text-sm font-semibold text-red-500 text-center mt-10">
                    Data disini bersifat sementara, 
                </div>
                <div class="text-sm font-semibold text-red-500 text-center">
                    Mohon untuk tidak menutup atau close halaman ini sebelum mendapatkan tiket anda.
                </div>
            </div>
        </div>
    @else
        <p>Data transaksi tidak ditemukan.</p>
    @endif
@endsection
