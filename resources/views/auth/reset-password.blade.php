{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@include('partials.start')

@include('partials.navbar')

<section class="w-full min-h-screen flex flex-col md:flex-row">
    <main class="w-full md:w-2/3 mb-4 md:mb-0 p-4 md:p-8 flex justify-center items-center">
        <div class="mx-auto lg:mt-16 mt-20 md:py-20">
            <img src="{{ asset('images/zmi-auth-image.png') }}" alt="ZMI-Images-Auth" class="w-full max-w-lg mx-auto" />
            <p class="text-center text-blue-900 text-lg font-semibold mt-4 mb-1">Partner Digital Untuk layanan Bisnis dan pemerintahan</p>
            <p class="text-center text-skyblue font-semibold text-sm">PT ZEN MULTIMEDIA INDONESIA</p>
        </div>
    </main>

    <aside class="w-full lg:w-1/3 bg-[#1F2A7C] min-h-screen">
        <div class="h-full px-6 flex flex-col justify-between">
            <div class="w-full max-w-full xl:max-w-xl mx-auto lg:px-6 mt-16 lg:mt-28">
                <div class="text-center mb-6">
                    <h3 class="text-xl md:text-1xl text-white">Selamat datang Kembali</h3>
                    <p class="text-base text-gray-300 mt-1">Pulihkan akun Anda</p>
                </div>
              <div class="flec flex-col justify-center h-full">
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
            <div class="text-center my-5 bottom-0">
                <span class="text-base text-gray-400">Copyright By: zenmultimediacorp.com</span>
            </div>
        </div>
    </aside>
</section>

@include('partials.end')
