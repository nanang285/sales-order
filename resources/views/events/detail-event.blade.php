@extends('layouts.main')
@section('container')
    @include('layouts.navbar')
    @include('components.preloader')

    <div class="bg-fixed bg-cover bg-no-repeat">
        <div class="relative py-12 lg:py-20 bg-opacity-90">

            <section class="mx-auto max-w-screen-full lg:px-6 py-10">
                <button onclick="history.back()"
                    class="fixed bg-blue-500 top-30 left-10 z-[10] text-white font-semibold text-base py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
                    <i class="fa-solid fa-left-long"></i> Kembali
                </button>
                <div class="container mx-auto px-4 sm:px-6 lg:px-10">
                    <div class="hidden" id="shadow"></div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="lg:max-w-none lg:flex rounded-xl transition-shadow duration-300 mb-2">
                        <div
                            class="relative w-full lg:w-2/1 flex justify-center items-center rounded-xl overflow-hidden shadow-lg border">
                            <div class="absolute inset-0 bg-cover bg-center blur-xl"
                                style="background-image: url('{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}');">
                            </div>
                            <img src="{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}"
                                class="relative z-10 rounded-xl no-select max-h-[300px] md:max-h-[450px] object-contain">
                        </div>
                    </div>

                    <div class="bg-white p-4 sm:p-6 shadow-lg border rounded-xl">

                        <div class="mb-4">
                            <div class="mx-auto max-w-full lg:text-left mb-3 flex flex-col">
                                <div class="flex justify-between items-center">
                                    <p class="mt-2 text-lg sm:text-xl lg:text-3xl font-bold tracking-tight text-gray-900">
                                        <span class="text-gray-800">{{ $event->judul }}</span>
                                    </p>
                                    <div class="mt-3 lg:mt-0 flex flex-col items-center justify-center text-center">
                                        @if ($event->status_quota == 'unlimited')
                                            @if ($event->type == 'berbayar')
                                                <span class="text-blue-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                </span>
                                            @endif
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class="block w-full lg:w-auto text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button">Dapatkan
                                            </button>
                                        @elseif ($event->quota > 0)
                                            @if ($event->type == 'berbayar')
                                                <span class="text-blue-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                </span>
                                            @endif
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class="block w-full lg:w-auto text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button">Dapatkan
                                            </button>
                                        @else
                                            <span class="text-red-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">Kuota Habis</span>
                                            <button id="outOfQuotaButton"
                                                class="cursor-not-allowed block w-full lg:w-auto text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button" disabled>Dapatkan
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm sm:text-base font-semibold flex flex-col sm:flex-row items-start sm:items-center">
                                <span class="mb-1 sm:mb-0 sm:mr-4">
                                    {{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('l, d-m-Y H:i:s') }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fa-solid fa-location-dot text-blue-700 text-lg mr-1"></i>
                                    {{ $event->lokasi }}
                                </span>
                            </p>
                            <hr class="mt-4">
                        </div>



                        <div>
                            <div class="flex flex-col text-base md:text-xl">
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
            @include('events.store-modal')
        </div>
    </div>
    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
