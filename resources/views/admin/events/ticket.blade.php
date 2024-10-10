@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-2lg font-bold">
                                Daftar Ticket
                            </h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="min-w-full">
                        <div class=" overflow-hidden py-4 px-1">
                            <table id="pagination-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                No
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Nama Lengkap
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Email
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Perusahaan
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jabatan
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Type Tiket
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Harga
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Aksi
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tickets as $index => $ticket)
                                        <tr>
                                            <td class="text-sm font-semibold text-gray-600">{{ $index + 1 }}</td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $ticket->nama_lengkap }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $ticket->email }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $ticket->nama_perusahaan }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $ticket->jabatan }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600 uppercase">
                                                {{ $ticket->type }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                Rp {{ number_format($ticket->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600 flex items-center space-x-2">
                                                <div class="relative group">
                                                    <a href="{{ route('event.ticket', $ticket->encrypted_kode_invoice) }}"
                                                        class="text-yellow-300 border border-yellow-300 hover:bg-yellow-400 hover:text-white font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
