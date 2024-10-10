@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div
                class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden flex justify-between items-center p-6 space-x-4">
                <div class="flex items-center space-x-4">
                    <img class="w-16 h-16 p-2 rounded-full border-2 border-blue-500"
                        src="{{ asset('dist/images/logo/zmi-logo-3.webp') }}" alt="Avatar">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Hai, {{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 text-xl font-semibold">
                            Semangat, dan selamat beraktivitas -
                            <span
                                id="date">{{ \Carbon\Carbon::now()->setTimezone(config('app.timezone'))->translatedFormat('l, d F Y') }}</span>
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <p id="time" class="text-xl font-semibold bg-blue-500 shadow-md px-2 py-1.5 rounded-md text-white">
                        {{ \Carbon\Carbon::now()->setTimezone(config('app.timezone'))->format('H.i.s') }}
                    </p>
                </div>
            </div>

            <script>
                function updateTime() {
                    var now = new Date();
                    var formattedTime = now.toLocaleTimeString('id-ID');
                    $('#time').text(formattedTime);
                }

                $(document).ready(function() {
                    setInterval(updateTime, 1000);
                });
            </script>

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden p-6">


                <div class="bg-white shadow-sm border rounded-lg p-6">
                    <div
                        class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full max-w-full">
                            <div class="flex items-center">
                                <h3 class="text-blue-700 text-2lg font-semibold py-2">
                                    Data Rekrutmen
                                </h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex space-x-6 col-span-10">
                        <div
                            class="w-72 max-w-md bg-white border border-gray-200 rounded-lg shadow-sm mt-4 overflow-hidden col-span-4">
                            <ul class="flex flex-wrap text-sm justify-between font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50"
                                id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                <li class="me-auto">
                                    <span class="inline-block p-2 text-blue-700 text-lg font-semibold">Total</span>
                                </li>
                            </ul>

                            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                                <h1 class="text-4xl font-bold text-left text-blue-700">{{ $recruitmentCount }}</h1>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                    <div
                        class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full max-w-full">
                            <div class="flex items-center">
                                <h3 class="text-blue-700 text-2lg font-semibold">
                                    Data Absen Karyawan
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
                                            <td
                                                class="px-4 py-2 whitespace-nowrap text-base font-bold 
                                                @if ($isAdmin) text-blue-600 hover:text-blue-800 border
                                                @else
                                                        text-gray-400 cursor-not-allowed border @endif">
                                                @if ($isAdmin)
                                                    <a href="{{ route('admin.absen.detail', $employee->id) }}">
                                                        <div class="fa-solid fa-eye"></div>
                                                    </a>
                                                @else
                                                    <span class="fa-solid fa-eye"></span>
                                                @endif
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
                                                <td
                                                    class="px-5 py-2 whitespace-nowrap text-sm font-medium border items-center justify-center">
                                                    @if ($selectedMonth->format('Y-m') < $currentMonth)
                                                        @if ($hadir)
                                                            {!! '<i class="fa-solid fa-check text-green-500 rounded-full"></i>' !!}
                                                            @php $totalKehadiran++; @endphp
                                                        @else
                                                            {!! '<i class="fa-solid fa-times text-red-500 rounded-full"></i>' !!}
                                                        @endif
                                                    @elseif($selectedMonth->format('Y-m') == $currentMonth && $day <= $today->day)
                                                        @if ($hadir)
                                                            {!! '<i class="fa-solid fa-check text-green-500 rounded-full"></i>' !!}
                                                            @php $totalKehadiran++; @endphp
                                                        @else
                                                            {!! '<i class="fa-solid fa-times text-red-500 rounded-full"></i>' !!}
                                                        @endif
                                                    @else
                                                        {!! '<span class="text-gray-400 rounded-full"></span>' !!}
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
