@extends('layouts.main')
@section('container')
    @include('partials.start')
    @include('admin.partials.toast')

    @if (session('session_expired'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('session_expired') }}
        </div>
    @endif

    <section class="bg-white w-full min-h-screen flex flex-col md:flex-row">
        <main class="hidden w-full md:w-2/3 mb-4 md:mb-0 lg:flex justify-center items-center">
            <div class="mx-auto fixed no-select">
                <img src="{{ asset('dist/images/homepages/zmi-auth-images.png') }}" alt="zen-multimedia-indonesia"
                    class="w-full max-w-md mx-auto" />
                <p class="text-center text-blue-900 text-xl font-semibold mt-4 mb-1">
                    Partner Digital Untuk Layanan Bisnis dan Pemerintahan
                </p>
                <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
            </div>
        </main>
        <aside class="w-full lg:w-2/5 bg-[#213c88f1] flex flex-col justify-between min-h-screen">
            <div class="flex-grow px-8">
                <div class="w-full max-w-md mx-auto mt-28">
                    <div class="text-center mb-10">
                        <h3 class="text-xl md:text-2xl text-white font-bold">Selamat Datang Kembali</h3>
                        <p class="text-base text-gray-300 mt-1">Pulihkan Akun Anda</p>
                    </div>
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <div class="relative">
                                <label for="email" class="block text-sm font-medium text-white mb-2">{{ __('Email') }}</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Alamat Email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" readonly>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label for="password" class="block text-sm font-medium text-white mb-2">Kata Sandi</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                                <input type="text" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Password Baru" required autocomplete="new-password">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Ulangi Sandi</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                                <input type="text" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Konfirmasi Password Baru" required autocomplete="new-password">
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-full text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                {{ __('Reset Password') }}
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
    @include('partials.end')
@endsection
