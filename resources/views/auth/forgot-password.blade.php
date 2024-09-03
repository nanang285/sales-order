@extends('layouts.main')
@section('container')
    <section class="bg-white w-full min-h-screen flex flex-col md:flex-row">
        <main class="hidden w-full md:w-2/3 mb-4 md:mb-0 lg:flex justify-center items-center">
            <div class="mx-auto fixed no-select">
                <img src="{{ asset('dist/images/homepages/zmi-auth-images.png') }}" alt="zen-multimedia-indonesia"
                    class="w-full max-w-md mx-auto" />
                <p class="text-center text-blue-900 text-xl font-semibold mt-4 mb-1">
                    Partner Digital Untuk Layanan Bisnis dan Pemerintahan</p>
                <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
            </div>
        </main>
        <aside class="w-full lg:w-2/5 bg-[#213c88f1] min-h-screen">
            <div class="h-full px-8 flex flex-col justify-between">
                <div class="w-full max-w-md xl:max-w-xl mx-auto lg:px-6 mt-28">
                    <div class="text-center mb-10">
                        <h3 class="text-xl md:text-1xl text-white">Selamat Datang Kembali</h3>
                        <p class="text-base text-gray-300 mt-1">Masuk Pulihkan akun Anda</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 bg-gray-100 text-center rounded" :status="session('status')" />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="relative">
                                <label for="email"
                                    class="block text-sm font-medium text-white mb-2">{{ __('Email') }}</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-regular fa-user"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Alamat Email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label class="block text-right text-sm font-medium text-white mb-2 hover:underline">
                                    <a href="{{ route('login') }}">Sudah punya Akun ?</a>
                                </label>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-1/2 text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                {{ __('Kirim') }}
                            </button>

                            <a href="{{ route('register') }}"
                                class="w-1/2 text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                daftar
                            </a>
                        </div>
                    </form>
                </div>
                <div class="text-center my-8 bottom-0">
                    <span class="text-base font-semibold text-gray-200">
                        Copyright By: {{ request()->getHost() }}
                    </span>
                </div>
            </div>
        </aside>
    </section>
@endsection
