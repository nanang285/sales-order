@extends('layouts.main')
@section('container')
@include('layouts.navbar')

    <div class="relative">
        <div id="about" class="bg-fixed bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-portfolio.jpg') }}')">
            <div class="relative max-h-screen py-28 lg:py-52 bg-gray-900 bg-opacity-90">
                <div class="mx-auto max-w-4xl">
                    <div class="flex justify-center">
                        <div class="mx-4 relative rounded-full px-3 mt-4 py-1 text-sm leading-6">
                            <div class="hidden lg:flex" id="shadow"></div>
                            <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white sm:text-6xl">
                                Yuk Lihat Hasil Dari Projek Yang Telah Kami Kerjakan !
                            </h1>
                            <p class="mt-6 text-lg lg:text-xl leading-8 text-center text-gray-200">
                                Kami di PT Zen Multimedia telah mengerjakan berbagai proyek yang mencakup pembuatan website,
                                aplikasi, dan multimedia. Berikut beberapa proyek yang telah kami kerjakan:
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
                <img src="{{ asset('dist/images/homepages/absolute1.png') }}"
                    class="absolute no-select -top-24 -right-24 w-full max-w-2xl" alt="Absolute 1">
                <div class=" mx-auto max-w-full lg:text-center mb-12">
                    <p class="mt-2 text-3xl lg:text-4xl font-bold tracking-tight text-gray-900 text-center">
                        <span class=" text-primary">Portofolio Kami</span>
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:grid-cols-3">
                    @foreach ($latestProject as $project)
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                            class="relative max-w-full rounded-xl bg-white overflow-hidden shadow-lg z-40 group">
                            <img class="w-full transform transition-transform duration-300 ease-in-out group-hover:scale-105 lg:group-hover:scale-110"
                                src="{{ asset('storage/uploads/latest-project/' . ($project->image_path ?? '')) }}"
                                alt="zmi-portofolio-images">
                            <div class="absolute shadow bg-white rounded-r-md top-6 left-0 p-2">
                                <img src="{{ asset('dist/images/logo/zmi-logo-3.webp') }}" class="max-w-10 mx-2 max-h-6">
                            </div>
                            <div class="px-4 py-4">
                                <div class="font-bold text-xl mb-2 hover:text-primary transition duration-300">
                                    <a target="_blank" href="{{ $project->button_link }}">{{ $project->title }} <span
                                            class="text-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                                    </a>
                                </div>
                                <p class="text-gray-700 text-base">
                                    {{ $project->subtitle }}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                            </div>
                        </div>
                    @endforeach
                </div>
                <img src="{{ asset('dist/images/homepages/absolute2.png') }}" class="absolute -bottom-24 -left-10 lg:w-1/4 max-w-xs"
                    alt="Zen Multimedia Indonesia">
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
