@extends('layouts.main')
@section('container')
    @include('layouts.navbar')
    @include('components.preloader')

    <div class="relative">
        <div class="bg-fixed bg-cover bg-no-repeat"  style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-portfolio.jpg') }}')">
            <div class="relative max-h-screen py-28 lg:py-56 bg-gray-900 bg-opacity-90">
                <div class="mx-auto max-w-4xl">
                    <div class="flex justify-center">
                        <div class="mx-4 relative rounded-full px-3 mt-12 lg:mt-0 text-sm leading-6">
                            <div class="hidden lg:flex" id="shadow"></div>
                            <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white sm:text-6xl">
                                Temukan Kesempatan untuk Berkembang dan Bersosialisasi!
                            </h1>
                            <p class="mt-6 text-lg lg:text-xl leading-8 text-center text-gray-200">
                                Selamat datang di acara yang diselenggarakan oleh PT Zen Multimedia Indonesia! Kami
                                mengundang Anda
                                untuk bergabung dalam berbagai kegiatan menarik yang dirancang untuk memperluas jaringan
                                Anda, berbagi pengetahuan, dan menemukan inspirasi baru. Apakah Anda seorang profesional,
                                pelajar, atau penggiat komunitas? Kami punya sesuatu untuk semua orang!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="projek-kami" class="w-full relative">
        <div class="py-8 relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-8 relative">
                <div class="mx-auto max-w-full lg:text-left mb-12 flex justify-between items-center">
                    <p class="mt-2 text-3xl lg:text-3xl font-bold tracking-tight text-gray-900 text-left">
                        <span class="text-primary">Zen Multimedia Events</span>
                    </p>
                    <div class="relative group">

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Filter <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="dropdown"
                            class="z-50 hidden bg-white divide-y border-gray-400 divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">AI</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">DevOps</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cloud</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cybersecurity</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:grid-cols-4">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="relative max-w-full rounded-xl bg-white border overflow-hidden shadow-lg z-40 group">
                        <img class="w-full transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist/images/event-zmi-2.png') }}">
                            <div
                            class="absolute top-3 right-3 z-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="bg-gray-300 text-gray-600 text-sm font-semibold w-10 h-10 rounded-full shadow-md hover:bg-gray-400 transition duration-200"
                                onclick="copyLink()">
                                <i class="fa-solid fa-copy"></i>
                            </button>
                        </div>
                        
                        <script>
                            function copyLink() {
                                // Link yang ingin di-copy
                                var link = "https://zenmultimedia.co.id/events/zen-multimedia-expo-2024";
                                
                                // Buat elemen input sementara
                                var tempInput = document.createElement("input");
                                tempInput.value = link;
                                document.body.appendChild(tempInput);
                        
                                // Pilih dan salin teks dari elemen input
                                tempInput.select();
                                tempInput.setSelectionRange(0, 99999); // Untuk mobile
                        
                                // Eksekusi perintah copy
                                document.execCommand("copy");
                        
                                // Hapus elemen input sementara
                                document.body.removeChild(tempInput);
                        
                                // Berikan notifikasi bahwa link telah disalin (opsional)
                                alert("Link berhasil disalin ke clipboard: " + link);
                            }
                        </script>
                        
                        <div class="px-4 py-4">
                            <div class="font-bold text-xl mb-2 text-gray-800">
                                <a target="_blank" href="{{ Route('detail-event')}}">
                                    <span class="text-lg font-bold">
                                        Zen Multimedia Expo 2024: Menjelajah Kreativitas Di Era Digital
                                    </span>
                                </a>
                            </div>
                            <p class="text-blue-700 text-sm font-semibold">
                                Kamis, 10 Oktober 2024 • 13:00 WIB
                            </p>
                            <p class="text-blue-800 text-base font-normal mb-2">
                                Kantor ZMI, Purwakarta.
                            </p>
                            <div class="flex justify-between no-select items-center">
                                <span
                                    class="bg-gray-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-blue-500">
                                    Kuota 100
                                </span>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">
                                    Gratis
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
