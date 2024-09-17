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

                    <div class="flex items-center space-x-2">
                        <p class="text-base text-gray-700 font-bold">
                            Total Kehadiran:
                            <label class="font-bold text-lg text-white bg-blue-500 px-3 py-1 rounded">
                                {{ $jumlahKehadiran }} Kehadiran
                            </label>
                        </p>
                        
                        <p class="text-base text-gray-700 font-bold">
                            Total Jam Kerja:
                            <label class="font-bold text-lg text-white bg-blue-500 px-3 py-1 rounded">
                                {{ $totalJamKerja }}
                            </label>
                        </p>
                        

                    </div>

                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class=" overflow-hidden">
                                <table id="dataTable" class="min-w-full mt-3 divide-y divide-gray-200">
                                    <thead>
                                        <tr class="">
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Hari
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Masuk
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Keluar
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Keterangan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($absens as $absen)
                                            <tr class="">
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ \Carbon\Carbon::parse($absen->date)->translatedFormat('l') }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ \Carbon\Carbon::parse($absen->date)->translatedFormat('d F Y') }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $absen->time_in }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $absen->time_out }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <span
                                                        class="
                                                    @if ($absen->keterangan == 'Hadir') bg-green-500 text-white
                                                    @elseif($absen->keterangan == 'Telat')
                                                        bg-orange-500 text-white @endif
                                                    px-2 py-1 rounded">
                                                        {{ $absen->keterangan }}
                                                    </span>

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
    </div>
@endsection
