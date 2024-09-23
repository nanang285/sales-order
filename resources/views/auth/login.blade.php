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
                    class="w-full max-w-md mx-auto rounded-lg" />
                <p class="text-center text-blue-900 text-xl font-semibold mt-4 mb-1">
                    Partner Digital untuk Layanan Bisnis dan Pemerintahan
                </p>
                <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
            </div>
        </main>

        <aside class="w-full lg:w-2/5 bg-[#213c88f1] min-h-screen flex flex-col">
            <div class="flex-grow px-8">
                <div class="w-full max-w-md mx-auto mt-28">
                    <div class="text-center mb-10">
                        <h3 class="text-xl md:text-2xl text-white font-bold">Selamat Datang Kembali</h3>
                        <p class="text-base text-gray-300 mt-1">Masuk ke akun Anda</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                    placeholder="Masukkan Email" required>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="my-1" />
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-white mb-2">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                    placeholder="Masukkan Kata Sandi" required>
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-blue-800">
                                    <span class="text-base"><i class="fa-solid fa-eye"></i></span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="my-1" />
                        </div>

                        <div class="mb-4 flex items-center justify-between">
                            <label class="flex items-center text-sm font-medium text-white">
                                <input type="checkbox" name="remember" class="rounded-lg">
                                <span class="ml-2">Ingat Saya</span>
                            </label>
                            <a href="{{ url('forgot-password') }}" class="text-sm font-medium text-white hover:underline">Lupa Kata Sandi?</a>
                        </div>
                        

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-full text-lg text-white bg-transparent border border-white rounded-md font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                Masuk
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
