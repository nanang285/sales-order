@extends('layouts.main')
@section('container')
    @include('components.preloader')

    <div class="bg-fixed bg-cover bg-no-repeat">
        <div class="relative bg-opacity-90">

            <section class="mx-auto max-w-screen-full lg:px-6 mb-8">
                <div class="container mx-auto px-4 sm:px-6 lg:px-10">
                    <button onclick="history.back()"
                        class="flex flex-wrap px-3 py-2.5 md:px-5 md:py-3 my-6 text-gray-700 border max-w-40 border-gray-200 rounded-lg bg-white shadow-sm"
                        aria-label="Breadcrumb">
                        <ol class="flex flex-wrap items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <p href="" class="text-sm font-bold text-gray-700 hover:text-blue-600">
                                    <i class="fa-solid fa-chevron-left mx-1"></i>
                                    Kembali
                                </p>
                            </li>
                        </ol>
                    </button>
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
                                    <p class="mt-2 text-base md:text-lg lg:text-2xl font-bold tracking-tight text-gray-900">
                                        <span class="text-gray-800">{{ $event->judul }}</span>
                                    </p>
                                    <div class="mt-3 lg:mt-0 flex flex-col items-center justify-center text-center">
                                        @if ($event->status_quota == 'unlimited')
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class=" mb-2 block w-full lg:w-auto text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button">Dapatkan
                                            </button>
                                            @if ($event->type == 'berbayar')
                                                <span
                                                    class="text-blue-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        @elseif ($event->quota > 0)
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                class="mb-2 block w-full lg:w-auto text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button">Dapatkan
                                            </button>
                                            @if ($event->type == 'berbayar')
                                                <span
                                                    class="text-blue-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">
                                                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        @else
                                            <span
                                                class="text-red-500 text-sm sm:text-base font-medium mb-2 lg:mb-0 lg:mr-2">Kuota
                                                Habis</span>
                                            <button id="outOfQuotaButton"
                                                class="cursor-not-allowed block w-full lg:w-auto text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm sm:text-base px-4 py-2 text-center"
                                                type="button" disabled>Dapatkan
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm sm:text-base font-semibold mb-2">
                                <span class="sm:mb-0">
                                    {{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('l, d-m-Y H:i:s') }}
                                </span>
                            </p>
                            <p class="text-gray-700 text-sm sm:text-base font-semibold flex items-center">
                                <i class="fa-solid fa-location-dot text-blue-700 text-lg mr-1"></i>
                                {{ $event->lokasi }}
                            </p>
                            
                            <hr class="mt-4">
                        </div>

                        <div>
                            <div class="flex flex-col text-base md:text-lg">
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
