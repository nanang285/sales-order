@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
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
                    <p class="text-gray-500 text-xl font-semibold">Semangat, dan selamat beraktivitas - {{ $currentDate }}
                    </p>
                </div>
            </div>

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden p-6">
                <div class="flex space-x-6 col-span-10">
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Data Rekrutmen</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $recruitmentCount }}</h1>
                        </div>
                    </div>
                    {{-- <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700">Belum Dimulai</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $failedStage1 }}</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700"> Tes Projek</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $failedStage2 }}</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700"> Interview</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $failedStage3 }}</h1>
                        </div>
                    </div>
                    <div
                        class="w-72 max-w-md bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex items-center p-6 space-x-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-700"> Penawaran</h2>
                            <h1 class="text-skyblue text-3xl font-bold">{{ $failedStage4 }}</h1>
                        </div>
                    </div> --}}
                </div>

                <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                    <div
                        class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full max-w-full">
                            <div class="flex items-center">
                                <h3 class="text-blue-700 text-lg font-semibold">
                                    <i class="fa-solid fa-caret-right"></i>&nbsp; Resume Absen
                                </h3>
                            </div>
                        </div>
                        <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                            <input type="month" id="month-input" name="month"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ request('month', $selectedMonth->format('Y-m')) }}" placeholder="Select month">
                            <button type="submit" class="bg-blue-500 text-white py-1.5 px-3 rounded-lg">
                                <i class="fa-solid fa-magnifying-glass text-base"></i>
                            </button>
                        </form>
                    </div>
                    <hr>
                    <div class="flex flex-col">
                        @php
                            $today = \Carbon\Carbon::now();
                            $daysInMonth = $selectedMonth->daysInMonth;
                            $currentMonth = $today->format('Y-m');
                        @endphp

                        <div class="relative overflow-x-auto">
                            <table id="dataTable" class="min-w-full mt-3 rounded-xl divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-2 py-2 text-start text-sm font-semibold text-blue-700 uppercase border">
                                            Aksi
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-2 text-start text-sm font-semibold text-blue-700 uppercase border">
                                            Nama
                                        </th>
                                        @foreach (range(1, $daysInMonth) as $day)
                                            <th scope="col"
                                                class="px-5 py-2 text-start text-sm font-semibold text-blue-700 uppercase border">
                                                {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                                            </th>
                                        @endforeach
                                        <th scope="col"
                                            class="px-5 py-2 text-start text-sm font-semibold text-blue-700 uppercase border sticky right-0 bg-white z-10">
                                            Total Kehadiran
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y rounded-xl divide-gray-200">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td class="px-4 py-2 whitespace-nowrap text-base font-bold text-blue-600 hover:text-blue-800 border">
                                                <a href="{{ route('admin.absen.detail', $employee->id) }}">
                                                    <div class="fa-solid fa-eye"></div>
                                                </a>
                                            </td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm font-bold text-gray-800 border">
                                                {{ $employee->name }}
                                            </td>
                                            @php
                                                $totalKehadiran = 0;
                                            @endphp
                                            @foreach (range(1, $daysInMonth) as $day)
                                                @php
                                                    $date = $selectedMonth
                                                        ->startOfMonth()
                                                        ->addDays($day - 1)
                                                        ->format('Y-m-d');
                                                    $hadir = $absens
                                                        ->where('fingerprint_id', $employee->fingerprint_id)
                                                        ->where('date', $date)
                                                        ->first();
                                                @endphp
                                                <td class="px-5 py-2 whitespace-nowrap text-sm font-medium border">
                                                    @if ($selectedMonth->format('Y-m') < $currentMonth)
                                                        @if ($hadir)
                                                            <i class="fa-solid fa-check text-green-500 rounded-full"></i>
                                                            @php $totalKehadiran++; @endphp
                                                        @else
                                                            <i class="fa-solid fa-times text-red-500 rounded-full"></i>
                                                        @endif
                                                    @elseif($selectedMonth->format('Y-m') == $currentMonth && $day <= $today->day)
                                                        @if ($hadir)
                                                            <i class="fa-solid fa-check text-green-500 rounded-full"></i>
                                                            @php $totalKehadiran++; @endphp
                                                        @else
                                                            <i class="fa-solid fa-times text-red-500 rounded-full"></i>
                                                        @endif
                                                    @else
                                                        <span class="text-gray-400 rounded-full">-</span>
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td
                                                class="px-5 py-4 whitespace-nowrap text-base font-bold text-gray-800 border sticky right-0 bg-white z-10">
                                                {{ $totalKehadiran }}
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
