@extends('layouts.main')
@section('container')
    @include('layouts.navbar')

    @include('partials.pop-up')

    <div class="relative">
        <div class="bg-fixed bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-hero.webp') }}')">
            <div class="relative bg-gray-900 bg-opacity-90">
                <div class="px-4 mx-auto sm:max-w-xl md:max-w-screen-xl md:px-24 lg:px-8 pt-16 lg:py-20">
                    <div class="hidden lg:flex" id="shadow"></div>
                    <div class="flex flex-col items-center justify-between md:flex-row py-8">
                        <div class="w-full max-w-full lg:mb-12 xl:mb-0 text-center lg:text-left xl:pr-16 xl:w-7/12">
                            <h2
                                class="max-w-xl mt-10 mb-6 text-4xl lg:text-left text-center font-semibold tracking-tight text-white">
                                Partner Digital Untuk layanan Bisnis Dan Pemerintahan
                            </h2>
                            <p class="max-w-xl mb-4 text-xl text-gray-300">
                                Kami melayani jasa pembuatan website, aplikasi, dan multimedia.
                            </p>
                            <a href="#services"
                                class="rounded-lg px-3.5 py-2 text-base font-semibold border border-gray-200 hover:bg-gray-200 hover:text-gray-800 text-white shadow-sm transition duration-300">
                                Lihat Selengkapnya
                            </a>
                        </div>
                        <div class="w-full max-w-lg  xl:w-xl">
                            <div class="flex items-center justify-center flex-col lg:flex-row">
                                <div class="flex-none">
                                    <img src="{{ asset('dist/images/homepages/zmi-hero-images.webp') }}"
                                        alt="zenmultimediaindonesia" class="w-full max-w-xl h-auto object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="w-full relative">
        <div class="py-12 relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-8 relative">
                <div id="services" class="absolute -top-32"></div>
                <img src="{{ asset('dist/images/homepages/absolute1.png') }}"
                    class="absolute no-select -top-24 -right-24 w-full max-w-2xl" alt="Absolute 1">
                <div class=" mx-auto max-w-full lg:text-center mb-12">
                    <p class=" text-3xl font-bold tracking-tight text-gray-900 text-center">
                        <span class=" text-primary">Layanan Kami</span>
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:grid-cols-2">
                    @if ($serviceSection->isEmpty())
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                            class="bg-white border shadow-sm hover:shadow-[#91aaff9f] rounded-xl lg:h-full p-6 lg:p-8 z-20 flex flex-col lg:flex-row">
                            <div class="order-2 lg:order-1">
                                <h3 class="lg:text-2xl font-bold lg:font-semibold">
                                    <span class="text-primary">IT Solution</span>
                                </h3>
                                <p class="mt-2 text-lg lg:max-w-80 font-semibold text-gray-600">
                                    <span class="text-skyblue">Kami menyediakan berbagai macam layanan IT, mulai dari
                                        pembuatan Website, Pembuatan Aplikasi, Penyediaan Server, dan lainnya</span>
                                </p>
                            </div>
                            <div class="order-1 lg:order-2 flex justify-center items-center">
                                <img src="{{ asset('dist/validate/service-section/zmi-services1.png') }}" alt="Dummy Image"
                                    class="relative w-full max-w-72 lg:w-full h-auto object-cover mb-4 lg:mb-0 no-select">
                            </div>
                        </div>
                    @else
                        @foreach ($serviceSection as $service)
                            <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                                class="bg-white border shadow-sm hover:shadow-[#91aaff9f] rounded-xl lg:h-full p-6 lg:p-8 z-20 flex flex-col lg:flex-row">
                                <div class="order-2 lg:order-1">
                                    <h3 class="lg:text-2xl font-bold lg:font-semibold">
                                        <span class="text-primary">{{ $service->title }}</span>
                                    </h3>
                                    <p class="mt-2 text-lg lg:max-w-80 font-semibold text-gray-600">
                                        <span class="text-skyblue">{{ $service->subtitle }}</span>
                                    </p>
                                </div>
                                <div class="order-1 lg:order-2 flex justify-center items-center">
                                    <img src="{{ asset('storage/uploads/service-section/' . ($service->image_path ?? 'dist/validate/latest-project/service-section/zmi-services (1).png')) }}"
                                        alt=""
                                        class="relative w-full max-w-72 lg:w-full h-auto object-cover mb-4 lg:mb-0 no-select">
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <img src="{{ asset('dist/images/homepages/absolute2.png') }}"
                    class="absolute -bottom-24 -left-10 lg:w-1/4 max-w-xs" alt="Zen Multimedia Indonesia">
            </div>
        </div>
    </section>

    <div class="bg-fixed bg-cover bg-no-repeat py-12 lg:py-14"
        style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-about.webp') }}')">
        <section class="mx-auto max-w-screen-full lg:px-6">
            <div class="container mx-auto px-6 lg:px-10">
                <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                    class="lg:py-8 lg:my-5 lg:px-2 lg:max-w-none lg:flex rounded-xl ring-1 bg-white ring-gray-200">
                    <div class="w-full lg:w-1/2 flex flex-wrap p-5">
                        @if (!empty($aboutSection->video_path))
                            <video class="w-full lg:max-w-lg mx-auto lg:mx-10 border rounded-lg object-cover" controls
                                controlsList="nodownload">
                                <source src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                                    type="video/webm">
                            </video>
                        @else
                            <video class="w-full lg:max-w-lg mx-auto lg:mx-10 border rounded-lg object-cover" controls
                                controlsList="nodownload">
                                <source src="{{ asset('dist/validate/about-section/zmi-profil-video.webm') }}"
                                    type="video/webm">
                            </video>
                        @endif
                    </div>
                    <div class="w-full lg:w-1/2 flex flex-wrap p-5">
                        <div class="mb-3">
                            <h1 class="text-2xl lg:top-0 md:mx-5 mb-2 font-bold tracking-tight text-primary">
                                Mengapa Harus ZMI?
                            </h1>
                            <p class="md:mx-5 max-w-full text-sm text-primary">
                                {{ $aboutSection->subtitle ?? 'PT Zen Multimedia adalah perusahaan IT yang berfokus pada pembuatan website, aplikasi, dan multimedia. Berbasis di Purwakarta, kami terdiri dari tim berpengalaman yang memberikan layanan purna jual terbaik. Kami melayani pemerintahan, UMKM, swasta, dan perseorangan.' }}
                            </p>
                        </div>
                        <div class="flex-row">
                            <p class="md:mx-5 mb-3 max-w-full text-sm text-primary">
                                <span class="text-green-600"><i class="fa-regular fa-circle-check"></i></span>
                                Ahli dalam Konsultasi IT (Web & Development Sistem)
                            </p>
                            <p class="md:mx-5 mb-3 max-w-full text-sm text-primary">
                                <span class="text-green-600"><i class="fa-regular fa-circle-check"></i></span>
                                Fleksibilitas dalam Pelayanan Pelanggan
                            </p>
                            <p class="md:mx-5 mb-3 max-w-full text-sm text-primary">
                                <span class="text-green-600"><i class="fa-regular fa-circle-check"></i></span>
                                Kompetensi dalam Multimedia
                            </p>
                            <p class="md:mx-5 mb-3 max-w-full text-sm text-primary">
                                <span class="text-green-600"><i class="fa-regular fa-circle-check"></i></span>
                                Inovasi dan Kreativitas
                            </p>
                        </div>
                        <img src="{{ asset('dist/images/homepages/diskominfo.png') }}"
                            class="md:mx-5 max-w-44 max-h-12 object-contain">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="w-full relative py-6 lg:py-12">
        <div class="container mx-auto px-6 lg:px-9">
            <div>
                <p class="text-2xl font-bold tracking-tight text-gray-900 md:text-3xl">
                    <span class="text-primary"><a href="{{ Route('portofolio') }}">Portofolio</a></span>
                </p>
            </div>
            <div class="relative">
                <div class=" lg:mt-12 mt-6 swiper-container swiper-latest-project rounded-xl">
                    <div class="swiper-wrapper">
                        @if ($latestProject->isEmpty())
                            <div class="swiper-slide relative">
                                <div class="relative group h-full ">
                                    <img src="{{ asset('dist/validate/latest-project/project1.png') }}"
                                        class="rounded-md w-full h-64 lg:h-80 object-cover" alt="zenmultimedia">
                                    <div
                                        class="bg-black md:mt-32 absolute inset-0 flex opacity-0 rounded group-hover:opacity-85 duration-300 group-hover:animation-slideUp">
                                        <div class="flex flex-col h-full mx-9 justify-center">
                                            <p class="text-white text-2xl font-bold lg:mt-0 mb-2">
                                                ZEN Multimedia
                                            </p>
                                            <p class="text-white text-base md:text-lg mb-4 lg:max-w-full">
                                                {{ Str::limit('Zen Multimedia adalah perusahaan IT yang berfokus pada pembuatan website, aplikasi, dan multimedia. Berbasis di Purwakarta', 120) }}
                                            </p>
                                            <div>
                                                <a href="https://zenmultimediacorp.com"
                                                    class="font-semibold inline-block border border-white text-white py-1.5 px-4 lg:py-2 lg:px-5 rounded-md hover:bg-white hover:text-gray-800 text-sm transition duration-500">
                                                    Lihat Selengkapnya
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($latestProject->take(5) as $project)
                                <div class="swiper-slide relative">
                                    <div class="relative group h-full ">
                                        <img src="{{ asset('storage/uploads/latest-project/' . $project->image_path) }}"
                                            class="rounded-md w-full h-64 lg:h-80 object-cover"
                                            alt="{{ $project->button_link }}">
                                        <div
                                            class="bg-black md:mt-32 absolute inset-0 flex opacity-0 rounded group-hover:opacity-85 duration-300 group-hover:animation-slideUp">
                                            <div class="flex flex-col h-full mx-9 justify-center">
                                                <p class="text-white text-2xl font-bold lg:mt-0 mb-2">
                                                    {{ $project->title }}
                                                </p>
                                                <p class="text-white text-base md:text-lg mb-4 lg:max-w-full">
                                                    {{ Str::limit($project->subtitle, 120) }}
                                                </p>
                                                <div>
                                                    <a href="{{ $project->button_link }}" target="_blank"
                                                        class="font-semibold inline-block border border-white text-white py-1.5 px-4 lg:py-2 lg:px-5 rounded-md hover:bg-white hover:text-gray-800 text-sm transition duration-500">
                                                        Lihat Selengkapnya
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="z-40" style="position: absolute; right: 32px; top: 40%; transform: translateY(-50%);">
                    <div class="button-next fixed flex items-center justify-center text-white bg-violet hover:bg-primary rounded-full duration-300 transition-colors"
                        style="width: 55px; height: 55px;">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="w-full">
        <div class="">
            <div class=" container mx-auto px-6 lg:px-8">
                <div class="mx-auto max-w-full lg:text-center mb-6">
                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center">
                        <span class="text-primary">Galeri</span>
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 ">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="lg:mt-12">
                        <div class=" lg:mt-8 lg:p-4 mt-2 mb-5 text-primary">
                            <h3 class="mt-2  lg:max-w-md lg:text-3xl font-semibold">
                                Beberapa Dokumentasi Dari Kegiatan Kami
                            </h3>
                            <h3 class="lg:text-3xl font-semibold mt-5">
                                <div class="">
                                    <a href="{{ Route('documentation') }}"
                                        class="font-semibold inline-block border border-primary text-primary py-2 px-5 rounded-md hover:bg-primary hover:text-white text-sm transition duration-500">
                                        Lihat Lebih Banyak
                                    </a>
                                </div>
                            </h3>
                        </div>
                    </div>
                    @foreach ($galerySection->take(3) as $galery)
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                            class="bg-white rounded-xl lg:m-3 shadow-lg">
                            <a href="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                data-lightbox="gallery" data-title="{{ $galery->title }}">
                                <img src="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                    alt="{{ $galery->title }}" class="w-full rounded-xl h-64 lg:h-80 object-cover">
                                <div
                                    class="bg-gray-800 rounded-lg absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-80 transition-opacity duration-300">
                                    <div class="flex flex-col p-6 text-center">
                                        <p class="text-white text-2xl font-bold mb-4">{{ $galery->title }}</p>
                                        <p class="text-white text-lg lg:max-w-lg">
                                            {{ $galery->subtitle }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

    <div id="about" class="bg-fixed bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('images/Rectangle 36.png') }}')">
        <section id="client" class="bg-lightblue py-6 mt-10 w-full">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="mx-auto py-4 max-w-2xl lg:text-center">
                    <p class=" text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl text-center">
                        <span class="text-primary">Mitra Kami</span>
                    </p>
                </div>
                <div class="relative mt-4 swiper-container swiper-klien-kami rounded-md overflow-hidden">
                    <div class="marquee-container flex items-center space-x-4 animate-marquee">
                        @foreach ($clientSection as $client)
                            <div class="client-logo flex-shrink-0 flex justify-center mx-2 h-auto">
                                <img src="{{ asset('storage/uploads/client-section/' . $client->image_path) }}"
                                    alt="Client {{ $loop->iteration }}" class="object-contain h-52 max-w-full">
                            </div>
                        @endforeach
                        @foreach ($clientSection as $client)
                            <div class="client-logo flex-shrink-0 flex justify-center mx-2 h-auto">
                                <img src="{{ asset('storage/uploads/client-section/' . $client->image_path) }}"
                                    alt="Client {{ $loop->iteration }}" class="object-contain h-52 max-w-full">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
