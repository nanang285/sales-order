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
                    Partner Digital Untuk Layanan Bisnis dan Pemerintahan</p>
                <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
            </div>
        </main>
        <aside class="w-full lg:w-2/5 bg-[#213c88f1] min-h-screen">
            <div class="h-full px-8 flex flex-col justify-between">
                <div class="w-full max-w-md xl:max-w-xl mx-auto lg:px-6 mt-28">
                    <div class="text-center mb-10">
                        <h3 class="text-xl md:text-1xl text-white">Selamat Datang Kembali</h3>
                        <p class="text-base text-gray-300 mt-1">Masuk ke akun Anda</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="relative">
                                <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Email" required>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="my-1" />
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
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Kata Sandi" required>
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 end-0 flex items-center pe-3 text-blue-800">
                                    <span class="text-base"><i class="fa-solid fa-eye"></i></span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="my-1" />
                        </div>

                        <div class="mb-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember_token" id="remember"
                                    class="text-blue-500 rounded-lg">
                                <label for="remember" class="ml-2 block text-sm font-medium text-white">
                                    Ingat Saya
                                </label>
                            </div>
                            <div class="relative">
                                <label class="block text-right text-sm font-medium text-white hover:underline">
                                    <a href="{{ url('forgot-password') }}">Lupa kata Sandi ?</a>
                                </label>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-full text-lg text-white bg-transparent border border-white rounded-md font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                Masuk
                            </button>
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
    @include('partials.end')
@endsection
