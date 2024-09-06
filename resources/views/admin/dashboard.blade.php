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

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden p-6">
                <div class="flex space-x-6 col-span-10">
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Total Karyawan</h2>
                            <h1 class="text-skyblue text-3xl font-bold">0</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Data Rekrutmen</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $recruitmentCount }}</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Diterima</h2>
                            <h1 class="text-skyblue text-3xl font-bold">0</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700"> Tidak Diterima</h2>
                            <h1 class="text-skyblue text-3xl font-bold">0</h1>
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
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                            </div>
                            <input type="month" id="month-input" name="month-input"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Select month">
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


