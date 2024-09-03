@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            @php
                use Carbon\Carbon;
                setlocale(LC_TIME, 'id_ID'); // Untuk mengatur ke bahasa Indonesia
                \Carbon\Carbon::setLocale('id'); // Set locale untuk Carbon
                $currentDate = Carbon::now()->translatedFormat('l, d F Y');
            @endphp

            <div class="max-w-full mx-auto my-4 bg-white border rounded-xl overflow-hidden flex items-center p-6 space-x-4">
                <img class="w-16 h-16 p-2 rounded-full border-2 border-blue-500" src="{{ asset('dist/images/logo/zmi-logo-3.webp')}}"
                    alt="Avatar">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Hai, Admin ZMI</h2>
                    <p class="text-gray-500">Semangat, dan selamat beraktivitas - {{ $currentDate }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <footer class="w-full text-center absolute bottom-0 mb-4 text-gray-500">
    <p class="text-sm">
        © 2019-2023 <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights reserved.
    </p>
</footer> --}}
