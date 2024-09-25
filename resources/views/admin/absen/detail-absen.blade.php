@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-xl mb-4">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-lg font-semibold flex items-center">
                                <i class="fa-solid fa-caret-right mr-2"></i> {{ $employee->name }}
                            </h3>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('admin.absen.detail', ['id' => $employee->id]) }}"
                        class="flex items-center space-x-2">
                        <input type="month" id="month-input" name="bulan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full max-w-44 p-2.5"
                            value="{{ request('bulan', now()->format('Y-m')) }}" placeholder="Select month">
                        <button type="submit"
                            class="bg-blue-500 text-white py-1.5 px-3 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fa-solid fa-magnifying-glass text-base"></i>
                        </button>
                    </form>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table id="dataTable" class="min-w-full mt-3 divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Hari</th>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Tanggal</th>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Masuk</th>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Keluar</th>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Keterangan</th>
                                            <th
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($absensiHarian as $absen)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ \Carbon\Carbon::parse($absen['tanggal'])->translatedFormat('l') }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ \Carbon\Carbon::parse($absen['tanggal'])->translatedFormat('d F Y') }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $absen['time_in'] ?? 'Belum Absen' }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $absen['time_out'] ?? '-' }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <span
                                                        class="@if ($absen['keterangan'] == 'Hadir') bg-green-500 text-white @elseif ($absen['keterangan'] == 'Telat') bg-orange-500 text-white @endif px-2 py-1 rounded">
                                                        {{ $absen['keterangan'] ?? 'Belum Absen' }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $absen['jam_kerja'] ?? 'Belum Dihitung' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                        </td>
                                        <td class="px-6 py-4 border whitespace-nowrap text-base font-bold text-gray-700">
                                            Total :
                                        </td>
                                        <td class="px-6 py-4 border whitespace-nowrap text-base font-bold text-gray-700">
                                            {{ $jumlahKehadiran }} Kehadiran
                                        </td>
                                        <td class="px-6 py-4 border whitespace-nowrap text-base font-bold text-gray-700">
                                            {{ $totalJamKerja }}
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
