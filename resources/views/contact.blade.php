@include('partials.start')
@include('partials.navbar')
@include('components.preloader')


<div class="relative">
    <div id="about" class="bg-fixed bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('images/kaleidico-RDYdOvk8ats-unsplash.jpg') }}')">
        <div class="relative max-h-screen py-32 lg:py-56 bg-gray-900 bg-opacity-85">
            <div class="mx-auto max-w-4xl">
                <div class="flex justify-center">
                    <div
                        class="mx-4 relative rounded-full px-3 mt-12 lg:mt-0 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        <div class="hidden lg:flex" id="shadow"></div>
                        <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white">
                            Siap Mulai Membangun Bisnis Anda Bersama Kami?
                        </h1>
                        <p class="mt-6 text-lg lg:text-xl leading-8 text-center text-gray-200">
                            Pintu kami selalu terbuka untuk membantu Anda. Kami senang mendengar dan lebih terlibat
                            dalam rencana digital Anda. Isi detail yang diperlukan, dan bersama-sama, mari kita
                            mendominasi dunia digital!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="w-full relative">
    <div class="py-8 relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8 relative">
            <div class="mx-auto mb-4 max-w-full lg:text-center">
                <p class="mt-4 text-3xl font-bold tracking-tight text-gray-900 text-center">
                    <span class="text-primary">Mari Bicara Tentang Bisnis</span>
                </p>
            </div>
            <div class="flex mb-10 flex-col md:flex-row">
                <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="md:w-1/2 p-6">
                    <h2 class="lg:text-3xl text-xl text-primary font-bold mb-4">Temukan Dan Berhubungan Dengan Kami Disini</h2>
                    <p class="text-base text-primary font-bold">
                        Telepon
                    </p>
                    <p class="text-base mb-4 text-primary font-normal">
                        <a href="https://api.whatsapp.com/send?phone={{ $footerSection->no_telp }}&text=Hallo%20Zen%20Multimedia%20Indonesia%2C%20" class="text-sm transition duration-400" target="_blank">{{ $footerSection->no_telp }}</a>
                    </p>
                    <p class="text-base text-primary font-bold">
                        Email
                    </p>
                    <p class="text-base mb-4 text-primary font-normal">
                        {{ $footerSection->email }}
                    </p>
                    <p class="text-base text-primary font-bold">
                        Alamat
                    </p>
                    <p class="text-base mb-4 text-primary font-normal">
                        {{ $footerSection->alamat }}
                    </p>
                    <a href="https://maps.app.goo.gl/as9uiF1qF9QEEGLv9" target="_blank"
                        class="font-semibold mb-4 text-xs inline-block border border-primary text-primary py-1.5 px-4 rounded hover:bg-primary hover:text-white transition duration-500">
                        Cek di Google Maps
                    </a>
                    <p class="text-base text-primary font-bold">
                        Sosial Media
                    </p>
                    <p class="text-base space-x-2 flex text-primary font-bold">
                        <a class="text-xl hover:text-blue-800 transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_1 }}">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a class="text-xl hover:text-blue-800 transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_2 }}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a class="text-xl hover:text-blue-800 transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_3 }}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a class="text-xl hover:text-blue-800 transition duration-400" target="_blank"
                            href="https://api.whatsapp.com/send?phone={{ $footerSection->no_telp }}&text=Hallo%20Zen%20Multimedia%20Indonesia%2C%20" class="text-sm transition duration-400" target="_blank"">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="mt-8 md:w-1/2 bg-fixed rounded bg-cover bg-no-repeat" style="background-image: url('{{ asset('images/Rectangle 38.png') }}')">
                    <div class="relative rounded bg-[#000000b3] w-full flex justify-center items-center">
                        <div class="relative max-h-auto w-full my-12 mx-6">
                            <div class="mx-auto max-w-full lg:text-center mb-10">
                                <p class="mt-4s text-3xl font-bold tracking-tight text-gray-900 text-center">
                                    <span class="text-gray-200">Hubungi kami</span>
                                </p>
                                <p class="mt-4 max-w-md text-base font-bold tracking-tight text-gray-900 text-center mx-auto">
                                    <span class="text-gray-200">Isi formulir dan tim kami akan menghubungi Anda kembali dalam waktu 24 jam,</span>
                                </p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="mx-auto max-w-md">
                                @csrf
                                <div class="mb-3">
                                    <div class="relative">
                                        <label for="email" class="block text-sm font-medium text-white mb-2">Nama Lengkap</label>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <span class="text-base text-primary">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                            placeholder="Masukan Nama Lengkap">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="my-1" />
                                </div>
                                <div class="mb-3">
                                    <div class="relative">
                                        <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <span class="text-base text-primary">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                            placeholder="Masukan email Anda">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="my-1" />
                                </div>
                                <div class="mb-3">
                                    <div class="relative">
                                        <label for="email" class="block text-sm font-medium text-white mb-2">No Telp</label>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <span class="text-base text-primary">
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                            placeholder="Masukan No.Telp Anda">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="my-1" />
                                </div>
                                <div class="mb-3">
                                    <div class="relative">
                                        <label for="email" class="block text-sm font-medium text-white mb-2">Isi Pesan</label>
                                    </div>
                                    <div class="relative">
                                        <textarea name="subtitle" id=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                            block w-full h-16 max-h-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            placeholder="Masukan Pesan Anda" required></textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="my-1" />
                                </div>
                                <div class="flex space-x-3">
                                    <button type="submit"
                                        class="w-full text-lg text-white bg-transparent border border-white rounded-md font-bold hover:bg-white hover:text-primary py-1 transition duration-300">
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.banner')
@include('partials.footer')
@include('partials.end')
