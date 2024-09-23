@extends('layouts.main')
@section('container')
<section class="bg-white w-full min-h-screen flex flex-col md:flex-row">
    <main class="hidden w-full md:w-2/3 mb-4 md:mb-0 lg:flex justify-center items-center">
        <div class="mx-auto fixed no-select text-center">
            <img src="{{ asset('dist/images/homepages/zmi-auth-images.png') }}" alt="zen-multimedia-indonesia"
                class="w-full max-w-md mx-auto rounded-lg" />
            <p class="text-blue-900 text-xl font-semibold mt-4 mb-1">
                Partner Digital untuk Layanan Bisnis dan Pemerintahan
            </p>
            <p class="text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>
    <aside class="w-full lg:w-2/5 bg-[#213c88f1] min-h-screen flex flex-col justify-between">
        <div class="flex-grow px-8">
            <div class="w-full max-w-md mx-auto mt-28">
                <div class="text-center mb-10">
                    <h3 class="text-xl md:text-2xl text-white font-bold">Selamat Datang Kembali</h3>
                    <p class="text-lg text-gray-300">Pulihkan Akun Anda</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 bg-gray-100 text-center rounded" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-white mb-2">{{ __('Email') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center ps-3.5 pointer-events-none">
                                <span class="text-base text-primary">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                placeholder="Masukan Alamat Email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-3 text-right">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-white hover:underline">Sudah punya Akun?</a>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit"
                            class="w-full text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                            {{ __('Kirim') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center p-4">
            <span class="text-base font-semibold text-gray-300">
                &copy; {{ date('Y') }} {{ request()->getHost() }}. All Rights Reserved.
            </span>
        </div>
        
    </aside>
</section>
@endsection
