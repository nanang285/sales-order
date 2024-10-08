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
                                                type="button" @if ($event->type == 'berbayar')  @endif>
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
            @include('events.store-modal')
        </div>
    </div>
    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
