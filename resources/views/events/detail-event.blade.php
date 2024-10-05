@extends('layouts.main')
@section('container')
    @include('layouts.navbar')
    @include('components.preloader')

    <div class="bg-fixed bg-cover bg-no-repeat">
        <div class="relative py-12 lg:py-20 bg-opacity-90">
            <section class="mx-auto max-w-screen-full lg:px-6 py-10">
                <div class="container mx-auto px-6 lg:px-10">
                    <div class="hidden" id="shadow"></div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="lg:max-w-none lg:flex rounded-xl transition-shadow duration-300 mb-2">
                        <div
                            class="relative w-full lg:w-2/1 flex justify-center items-center rounded-xl overflow-hidden shadow-lg border">
                            <div class="absolute inset-0 bg-cover bg-center blur-xl"
                                style="background-image: url('{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}');">
                            </div>
                            <img src="{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}"
                                class="relative z-10 rounded-xl no-select max-h-[450px] object-contain">
                        </div>
                    </div>
                    <div class="bg-white p-6 shadow-lg border rounded-xl">
                        <div>
                            <div class="mb-4">
                                <p class="text-gray-700 text-base font-semibold">
                                    <span class="mr-4">
                                        {{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('l, d-m-Y H:i:s') }}</span>
                                    <i class="fa-solid fa-location-dot text-blue-700 text-lg"></i>
                                    {{ $event->lokasi }}
                                </p>
                                <div class="mx-auto max-w-full lg:text-left mb-3 flex justify-between items-center">
                                    <p class="mt-2 text-3xl lg:text-3xl font-bold tracking-tight text-gray-900 text-left">
                                        <span class="text-gray-800">
                                            {{ $event->judul }}
                                        </span>
                                    </p>
                                    @if ($event->status_quota == 'unlimited')
                                        <div class="flex items-center justify-center">
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class="block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                @if ($event->type == 'berbayar')
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                @else
                                                    Dapatkan Tiket
                                                @endif
                                            </button>
                                        </div>
                                    @elseif ($event->quota > 0)
                                        <div class="flex items-center justify-center">
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class="block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                @if ($event->type == 'berbayar')
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                @else
                                                    Dapatkan Tiket
                                                @endif
                                            </button>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-center">
                                            <span class="text-red-500 font-medium mr-2">Kuota Habis</span>
                                            <button id="outOfQuotaButton"
                                                class="block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                type="button" disabled>
                                                Kuota Habis
                                            </button>
                                        </div>
                                    @endif


                                </div>
                                <hr>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col">
                                <div class="prose">
                                    {!! $event->description !!}
                                </div>
                            </div>

                            <style>
                                .prose ul {
                                    list-style-type: disc;
                                    margin-left: 1.5rem;
                                }

                                .prose li {
                                    margin-bottom: 0.5rem;
                                }
                            </style>

                        </div>

                    </div>
                </div>
            </section>

            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 max-h-full">
                <div class="relative w-full max-w-5xl max-h-full">
                    <div class="relative rounded-lg">
                        <div class="absolute items-center justify-between -top-2 -right-2 dark:border-gray-600">
                            <button type="button"
                                class="text-gray-400 bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="flex flex-col md:flex-row p-4 md:p-5 space-y-4 md:space-y-0 bg-white rounded-xl">
                            <div class="md:w-1/2 px-2">
                                <div class="mb-6">
                                    <h1 class="text-lg font-bold text-center">Registrasi</h1>
                                </div>

                                <div>
                                    <form class="max-w-md mx-auto" method="POST"
                                        action="{{ route('payment-event.store') }}">
                                        @csrf
                                        <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="nama_lengkap"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Nama Lengkap
                                                </label>
                                            </div>
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="email" name="email" id="email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Email
                                                </label>
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="number" name="no_telp" id="no_telp"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="no_telp"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    No Telp
                                                </label>
                                            </div>
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="text" name="jabatan" id="jabatan"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="jabatan"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Jabatan/Posisi
                                                </label>
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="nama_perusahaan"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Nama Perusahaan
                                                </label>
                                            </div>
                                            <div class="relative z-0 w-full mb-5 group">
                                                <input type="text" name="alamat" id="alamat"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " required />
                                                <label for="alamat"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Alamat
                                                </label>
                                            </div>
                                        </div>

                                        <input type="hidden" name="harga" value="{{ $event->harga }}">
                                        <input type="hidden" name="jenis_produk" value="{{ $event->judul }}">
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <input type="hidden" name="image_path" value="{{ $event->image_path }}">
                                        <input type="hidden" name="waktu" value="{{ $event->waktu }}">
                                        <input type="hidden" name="type" value="{{ $event->type }}">

                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            {{ $event->type === 'gratis' ? 'Daftar' : 'Bayar' }}
                                        </button>

                                    </form>

                                    <p class="text-gray-600 text-sm font-normal text-left mx-3 mt-4 flex items-center">
                                        Powered by
                                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}"
                                            class="w-16 ml-2 no-select" alt="ZMI Logo">
                                    </p>

                                </div>
                            </div>

                            <div class="md:w-1/2 flex flex-col bg-gray-200 rounded-lg">
                                <img src="{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}"
                                    alt="Deskripsi Gambar" class="mb-2 rounded-lg max-w-full h-auto">

                                <h2 class="text-gray-600 text-base font-bold text-left mx-3 mb-2">Pesanan :</h2>
                                <p class="text-gray-600 text-sm font-normal text-left mx-3 mb-4">
                                    {{ now()->translatedFormat('l, d F Y • H:i') }}
                                </p>

                                <div class="flex justify-between items-center mx-3 mb-5">
                                    <p class="text-gray-600 text-sm font-normal">1 x {{ $event->judul }}</p>
                                    <p class="text-gray-600 text-sm font-normal">Rp
                                        {{ number_format($event->harga, 2, ',', '.') }}</p>
                                </div>

                                <div class="flex justify-between items-center mx-3">
                                    <h1 class="text-gray-600 text-base font-bold">Total</h1>
                                    <p class="text-gray-600 text-base font-bold">Rp
                                        {{ number_format($event->harga, 2, ',', '.') }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
