{{-- resources/views/auth/register.blade.php --}}
@include('partials.start')

@include('partials.navbar')

{{-- <section class="min-h-screen flex flex-col-reverse lg:flex-row">
    <main class="h-full w-full lg:w-2/3 p-8 flex justify-center items-center">
        <div class="mx-auto lg:py-20 md:mt-12">
            <img src="{{ asset('images/zmi-auth-image.png') }}" alt="ZMI-Images-Auth" class="w-full max-w-lg mx-auto" />
            <p class="text-center text-lg">Partner Digital Untuk layanan Bisnis dan pemerintahan</p>
            <p class="text-center text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>

    <aside class="w-full lg:w-1/3 bg-primary">
        <div class="h-full px-6 py-8 md:py-12 flex flex-col md:mx-14 justify-between">
            <div class="lg:max-w-lg md:max-w-full">
                <div class="text-center my-12">
                    <h3 class="text-xl md:text-1xl text-white">Daftar Akun Baru</h3>
                    <p class="text-base text-gray-300 mt-1">Buat akun Anda</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div class="relative">
                        <label for="name" class="block mb-2 text-sm text-white font-medium">Nama Pengguna *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol1.png') }}" alt="Icon"
                                    class="h-4 w-5 object-contain">
                            </span>
                            <input type="text" id="name" name="name"
                                class="w-full pl-10 pr-3 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Masukan Nama Pengguna" required autofocus autocomplete="username"
                                value="{{ old('name') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm text-white font-medium">Email *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol1.png') }}" alt="Icon"
                                    class="h-4 w-5 object-contain">
                            </span>
                            <input type="email" id="email" name="email"
                                class="w-full pl-10 pr-3 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Masukan Alamat Email" required autofocus autocomplete="username"
                                value="{{ old('email') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm text-white font-medium">Kata Sandi *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol2.png') }}" alt="Icon"
                                    class="h-4 w-5 object-contain">
                            </span>
                            <input type="password" id="password" name="password"
                                class="w-full pl-10 pr-10 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Masukan Kata sandi" required autocomplete="new-password" />
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-base cursor-pointer"
                                onclick="togglePasswordVisibility()">
                                <i class='fas fa-eye text-primary hover:text-danger'></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="relative">
                        <label for="password_confirmation" class="block mb-2 text-sm text-white font-medium">Ulagi Sandi
                            *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol2.png') }}" alt="Icon"
                                    class="h-4 w-5 object-contain">
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full pl-10 pr-10 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Ulagi Kata sandi" required autocomplete="new-password" />
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-base cursor-pointer"
                                onclick="togglePasswordVisibility()">
                                <i class='fas fa-eye text-primary hover:text-danger'></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <fieldset class="flex justify-between mb-4">
                        <div class="flex items-center">
                            <input id="option-1" type="radio" name="role" value="perorangan" class="w-4 h-4">
                            <label for="option-1" class="ml-2 text-sm font-medium text-white">
                                Perorangan
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="option-2" type="radio" name="role" value="perusahaan" class="w-4 h-4"
                                checked>
                            <label for="option-2" class="ml-2 text-sm font-medium text-white">
                                Perusahaan
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input id="option-3" type="radio" name="role" value="pemerintah" class="w-4 h-4">
                            <label for="option-3" class="ml-2 text-sm font-medium text-white">
                                Pemerintah
                            </label>
                        </div>
                    </fieldset>

                    <button type="submit"
                        class="w-full text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Daftar</button>

                    <a href="{{ route('login') }}"
                        class="block w-full text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Masuk</a>
                </form>
                <div class="text-center mt-16">
                    <span class="text-sm text-gray-400">Copyright By: zenmultimediacorp.com</span>
                </div>
            </div>
        </div>
    </aside>
</section> --}}

<section class="w-full min-h-screen flex flex-col md:flex-row">
    <main class="w-full hidden md:w-2/3 mb-4 md:mb-0 p-4 md:p-8 md:flex justify-center items-center">
        <div class="mx-auto lg:mt-16 mt-20 md:py-20 fixed">
            <img src="{{ asset('images/zmi-auth-image.png') }}" alt="ZMI-Images-Auth" class="w-full max-w-lg mx-auto" />
            <p class="text-center text-blue-900 text-lg font-semibold mt-4 mb-1">Partner Digital Untuk layanan Bisnis
                dan pemerintahan</p>
            <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>

    <aside class="w-full lg:w-1/3 bg-[#1F2A7C] min-h-screen">
        <div class="h-full px-6 flex flex-col justify-between">
            <div class="w-full max-w-md xl:max-w-xl mx-auto lg:px-6 mt-28">
                <div class="text-center mb-6">
                    <h3 class="text-xl md:text-1xl text-white">Selamat Datang Kembali</h3>
                    <p class="text-base text-gray-300 mt-1">Buat akun Anda</p>
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
                            class="w-1/2 text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Daftar</button>

                        <a href="{{ route('login') }}"
                            class="w-1/2 text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Masuk</a>
                    </div>
                </form>
            </div>
            <div class="text-center my-5 bottom-0">
                <span class="text-base text-gray-400">Copyright By: zenmultimediacorp.com</span>
            </div>
        </div>
    </aside>
</section>

@include('partials.end')
