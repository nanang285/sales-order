@include('partials.start')

@include('partials.navbar')

{{-- <section class="min-h-screen flex flex-col-reverse lg:flex-row">
    <main class="h-full w-full lg:w-2/3 p-8 flex justify-center items-center bg-fixed">
        <div class="mx-auto lg:py-20 md:mt-12">
            <img src="{{ asset('images/zmi-auth-image.png') }}" alt="Auth Images" class="w-full max-w-lg mx-auto" />
            <p class="text-center text-lg">Partner Digital Untuk layanan Bisnis dan pemerintahan</p>
            <p class="text-center text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>

    <aside class="w-full lg:w-1/3 bg-primary">
        <div class="h-full px-6 py-8 md:py-12 flex flex-col md:mx-14 justify-between">
            <div class="lg:max-w-lg md:max-w-full">
                <div class="text-center my-12">
                    <h3 class="text-xl md:text-1xl text-white">Selamat Datang Kembali</h3>
                    <p class="text-base text-gray-300 mt-1">Masuk ke akun Anda</p>
                </div>
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm text-white font-medium">Email *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol1.png') }}" alt="Icon" class="h-4 w-5 object-contain">
                            </span>
                            <input type="email" id="email" name="email"
                                class="w-full pl-10 pr-3 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Masukan Email Pengguna" required autofocus autocomplete="username"
                                value="{{ old('email') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm text-white font-medium">Kata Sandi *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <img src="{{ asset('images/icons/Symbol2.png') }}" alt="Icon" class="h-4 w-5 object-contain">
                            </span>
                            <input type="password" id="password" name="password"
                                class="w-full pl-10 pr-10 py-2 text-sm text-primary bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800"
                                placeholder="Masukan Kata sandi" required autocomplete="current-password" />
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-base cursor-pointer"
                                onclick="togglePasswordVisibility()">
                                <i class='fas fa-eye text-primary hover:text-danger'></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="text-right ">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-white hover:text-gray-300 transition duration-300 inline-block">Lupa Kata sandi?</a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Masuk</button>

                    <a href="{{ route('register') }}"
                        class="block w-full text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">Daftar</a>
                </form>
                <div class="text-center mt-16">
                    <span class="text-sm text-gray-400">Copyright By: zenmultimediacorp.com</span>
                </div>
            </div>
        </div>
    </aside>
</section> --}}

<section class="w-full min-h-screen flex flex-col md:flex-row">
    <main class="hidden w-full md:w-2/3 mb-4 md:mb-0 p-4 md:p-8 lg:flex justify-center items-center">
        <div class="mx-auto lg:mt-16 mt-20 md:py-20 fixed">
            <img src="{{ asset('images/zmi-auth-image.png') }}" alt="ZMI-Images-Auth" class="w-full max-w-lg mx-auto" />
            <p class="text-center text-blue-900 text-lg font-semibold mt-4 mb-1">Partner Digital Untuk layanan Bisnis dan
                pemerintahan</p>
            <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>

    <aside class="w-full lg:w-1/3 bg-[#1F2A7C] min-h-screen">
        <div class="h-full px-6 flex flex-col justify-between">
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
                                class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2"
                                placeholder="Masukan email Anda">
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
                            <button type="button" id="togglePassword" class="absolute inset-y-0 end-0 flex items-center pe-3 text-gray-700">
                                <span class="text-base"><i class="fa-solid fa-eye"></i></span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="my-1" />
                    </div>

                    <div class="mb-3">
                        <div class="relative">
                            <label class="block text-right text-sm font-medium text-white mb-2 hover:underline">
                                <a href="{{ url('forgot-password') }}">Lupa kata Sandi ?</a>
                            </label>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit"
                            class="w-1/2 text-lg text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                            Masuk
                        </button>

                        <a href="{{ route('register') }}"
                            class="w-1/2 text-lg text-center text-white bg-transparent border border-white rounded-lg font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                            Daftar
                        </a>
                    </div>
                </form>
            </div>
            <div class="text-center my-8 bottom-0">
                <span class="text-base text-gray-400">Copyright By: zenmultimediacorp.com</span>
            </div>

        </div>
    </aside>
</section>

@include('partials.end')
