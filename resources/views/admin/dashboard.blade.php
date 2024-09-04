@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            @php
                use Carbon\Carbon;
                setlocale(LC_TIME, 'id_ID');
                \Carbon\Carbon::setLocale('id');
                $currentDate = Carbon::now()->translatedFormat('l, d F Y');
            @endphp

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden flex items-center p-6 space-x-4">
                <img class="w-16 h-16 p-2 rounded-full border-2 border-blue-500"
                    src="{{ asset('dist/images/logo/zmi-logo-3.webp') }}" alt="Avatar">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Hai, {{ Auth::user()->name }}</h2>
                    <p class="text-gray-500 text-xl font-semibold">Semangat, dan selamat beraktivitas - {{ $currentDate }}</p>
                </div>
            </div>

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden P-6">
                <div class="flex space-x-6 col-span-10">
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Total Karyawan</h2>
                            <h1 class="text-skyblue text-3xl font-bold">24</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Data Rekrutmen</h2>
                            <h1 class="text-skyblue text-3xl font-bold">43</h1>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                    <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full max-w-full">
                            <div class="flex items-center">
                                <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;
                                    Resume Absen Karyawan</h3>
                            </div>
    
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class=" min-w-full inline-block align-middle">
                                <div class=" overflow-hidden">
                                    <table id="dataTable" class="min-w-full mt-3 rounded-xl divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                    Nama
                                                </th>
                                                @foreach (range(1, 9) as $day)
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                        {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                                                    </th>
                                                @endforeach
    
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase border">
                                                    Total Kehadiran
                                                </th>
    
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y rounded-xl divide-gray-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 border">
                                                Nanang Supriatna
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm  font-medium text-green-500 border">
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-base  font-bold text-gray-800 border">
                                                10
                                            </td>
                                            </t>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<footer class="w-full text-center absolute bottom-0 mb-4 text-gray-500">
    <span class="text-base font-semibold text-gray-400">&copy; {{ date('Y') }}
        {{ request()->getHost() }}. All rights reserved.
    </span>
</footer>
