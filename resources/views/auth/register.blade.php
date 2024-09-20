@extends('layouts.main')
@section('container')
    <section class="w-full min-h-screen flex flex-col md:flex-row">
        <main class="hidden w-full md:w-2/3 md:mb-0 lg:flex justify-center top-0 items-center">
            <div class="mx-auto fixed">
                <img src="{{ asset('dist/images/homepages/zmi-auth-images.png')  }}" alt="ZMI-Images-Auth"
                    class="w-full max-w-md mx-auto" />
                <p class="text-center text-blue-900 text-xl font-semibold mb-1">
                    Partner Digital Untuk Layanan Bisnis dan Pemerintahan</p>
                <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
            </div>
        </main>

        <aside class="w-full lg:w-2/5 bg-[#213c88f1] min-h-screen">
            <div class="h-full px-8 flex flex-col justify-between">
                <div class="w-full max-w-md xl:max-w-xl mx-auto lg:px-6 mt-20">
                    <div class="text-center mb-10">
                        <h3 class="text-xl md:text-1xl text-white">Selamat Datang</h3>
                        <p class="text-base text-gray-300 mt-1">Buat akun Anda Sekarang</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="relative">
                                <label for="name_user" class="block text-sm font-medium text-white mb-2">
                                    Nama Pengguna
                                </label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name_user"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Nama Pengguna">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="my-1" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Alamat Email">
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
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Masukan Kata Sandi">
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 end-0 flex items-center pe-3 text-gray-700">
                                    <span class="text-base"><i class="fa-solid fa-eye"></i></span>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="my-1" />
                        </div>

                        <div class="mb-4">
                            <div class="relative">
                                <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Ulangi
                                    Sandi</label>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-base text-primary">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                    placeholder="Ulangi Sandi">
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="relative">
                                <label for="role" class="block mb-2 text-sm font-medium text-white">Pilih Role</label>
                                <select id="role" name="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Pilih Opsi</option>
                                    <option value="perorangan">Perorangan</option>
                                    <option value="perusahaan">Perusahaan</option>
                                    <option value="pemerintahan">Pemerintahan</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('role')" class="my-1" />
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="w-1/2 text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300 cursor-not-allowed" disabled>Daftar</button>

                            <a href="{{ route('login') }}"
                                class="w-1/2 text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Masuk</a>
                        </div>
                    </form>
                </div>
                <div class="text-center my-8 bottom-0">
                    <span class="text-base text-gray-400">Copyright By: zenmultimediacorp.com</span>
                </div>

            </div>
        </aside>
    </section>
@endsection
