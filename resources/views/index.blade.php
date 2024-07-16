@include('partials.start')

@include('partials.pop-up')

@include('partials.navbar')

<section id="hero" class="w-full hero-section bg-primary text-white md:h-auto md:mt-20 mt-10 py-9"
    style="background-image: url('{{ asset('images/hero-background.png') }}')">

    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-wrap mt-10">
            <div class="w-full lg:w-1/2 items-center text-center lg:pl-6 lg:text-left lg:mt-24">
                <h1 class="text-white text-3xl xl:text-3xl mb-4 w-full lg:max-w-full font-bold">
                    <span>{{ $heroSection->title ?? '' }}</span>
                </h1>
                <p class="text-white text-lg mb-5">
                    <span>{{ $heroSection->subtitle ?? '' }}</span>
                </p>
                <div>
                    <a href="#services"
                        class="hover:animate-wiggle focus:animate-none font-semibold inline-block border border-white text-white py-2 px-4 rounded-md hover:bg-white hover:text-blue-900 text-sm transition duration-500">
                        <span>Lihat Selengkapnya</span>
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-1/2 xl:pl-20">
                <img src="{{ asset('storage/uploads/hero-section/' . ($heroSection->image_path ?? '')) }}"
                    alt="{{ $heroSection->image_path}}"
                    class="lg:w-[540px] w-[400px] lg:max-h-[380px] max-h-[300px] mt-12 lg:mt-0 mx-auto object-contain">
            </div>
        </div>
    </div>
</section>

<!-- <Untuk menampilakan sdadow navbar saat scroll mencapai Services> -->
<div id="shadow"></div>

<!-- Services Section -->
<section id="services" class="w-full relative">
    <div class="py-20 lg:py-24 relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-8 relative">
            <!-- Gambar absolut 1 kanan atas -->
            <img src="{{ asset('images/absolute1.png') }}" class="absolute -top-32 right-0 w-full max-w-2xl"
                alt="Absolute 1">
            <div class=" mx-auto max-w-full lg:text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center">
                    <span class=" text-primary">Layanan Kami</span>
                </p>
                <p data-aos-anchor-placement="top-center"
                    class="mt-6 md:text-base text-sm font-bold text-gray-600 text-center">
                    <span class="z-40 text-primary">
                        LAYANAN DIGITAL TERBAIK, UNTUK KEBUTUHAN ANDA
                    </span>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-16">
                @foreach ($serviceSection as $service)
                    <div data-aos="zoom-in" class="hover:bg-gray-100 bg-white rounded-lg p-5 lg:mb-4 lg:m-1  z-20"
                        style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)">
                        <div class="flex items-center justify-center h-20 w-20"
                            style="background-color: #0058dd17; border-radius: 50%;">
                            <img src="{{ asset('storage/uploads/service-section/' . ($service->image_path ?? '')) }}"
                                alt="" class="h-12 w-12 text-white">
                        </div>
                        <div class="mt-8 mb-5">
                            <h3 class="lg:text-3xl font-semibold"><span
                                    class="text-primary">{{ $service->title }}</span></h3>
                            <p class="mt-2 text-base font-semibold text-gray-600">
                                <span class="text-skyblue">{{ $service->subtitle }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach

                <!-- Gambar absolut 2 tengah-kanan -->
                <img src="{{ asset('images/absolute2.png') }}"class="absolute top-3/4 transform -translate-y-3/4 right-0"
                    width="312px">

            </div>
            <img src="{{ asset('images/absolute3.png') }}" class="absolute -bottom-24 -left-10 lg:w-1/4 max-w-xs"
                alt="Absolute 3">
        </div>
    </div>
</section>
<!-- End Services Section -->

<!-- About Section -->
<div id="about" class="anchor bg-fixed bg-cover bg-no-repeat py-12 lg:py-28"
    style="background-image: url('{{ asset('images/bg-about.webp') }}')">
    <section class="mx-auto max-w-screen-full lg:px-6">
        <div class="container mx-auto px-6 lg:px-10">
            <div class="lg:py-16 lg:my-5 lg:px-2 lg:max-w-none lg:flex rounded-md ring-1 bg-white ring-gray-200"
                style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">

                <div class="w-full lg:w-1/2 flex flex-wrap p-5">
                    <video class="w-full lg:m-2 lg:max-w-lg mx-auto lg:mx-10 rounded-md" controls
                        controlsList="nodownload">
                        <source src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                            type="video/webm">
                    </video>
                </div>

                <div class="w-full lg:w-1/2 flex flex-wrap p-5">

                    <h1 class="text-2xl md:text-3xl lg:top-0 md:mx-5 mb-4 font-bold tracking-tight text-primary">
                        Tentang Kami
                    </h1>

                    <p class="md:mx-5 max-w-full text-base text-primary">{{ $aboutSection->subtitle }}
                    </p>

                    <img src="{{ asset('images/kominfo593.png') }}"
                        alt="{{ $aboutSection->image_path }}" class="mt-5 md:mx-5 max-w-48 max-h-auto object-contain">
                </div>

            </div>
        </div>
    </section>
</div>
<!-- End About Section -->

<!-- Project Section -->
<section class="w-full relative py-6 lg:py-12 ">
    <div class="container mx-auto px-6 lg:px-9">
        <div>
            <p class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">
                <span class="text-primary">Portofolio</span>
            </p>
        </div>
        <div class="relative">
            <div class=" lg:mt-12 mt-6 swiper-container swiper-latest-project rounded-md">
                <div class="swiper-wrapper">

                    @foreach ($latestProject as $project)
                        <div class="swiper-slide relative" style="height: 330px; width: 700px;">
                            <div class="relative group h-full ">
                                <img src="{{ asset('storage/uploads/latest-project/' . ($project->image_path ?? '')) }}"
                                    class="rounded-md w-full h-full object-cover" alt="Slide 1">
                                <div
                                    class="bg-black md:mt-32 absolute inset-0 flex opacity-0 group-hover:opacity-85 transition-opacity duration-300">
                                    <div class="flex flex-col h-full mx-9 my-12 md:m-9">
                                        <p class="text-white text-2xl font-bold lg:mt-0 mb-2">
                                            {{ $project->title }}
                                        </p>

                                        <p class="text-white text-lg mb-4 lg:max-w-full">
                                            {{ Str::limit($project->subtitle, 120) }}
                                        </p>

                                        <div>
                                            <a href="{{ $project->button_link }}" target="_blank"
                                                class="hover:animate-wiggle focus:animate-none font-semibold inline-block border border-white text-white py-2 px-5 rounded-md hover:bg-white hover:text-gray-800 text-sm transition duration-500">
                                                Lihat Selengkapnya
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
<!-- Project Section -->

<!-- Gallery Section -->
<section id="latest" class="w-full">
    <div class=" lg:py-6">
        <div class=" container mx-auto px-6 lg:px-8">
            <div class="mx-auto max-w-full lg:text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center">
                    <span class="text-primary">Galeri</span>
                </p>
                
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4  sm:mt-12">

                <div data-aos="zoom-in" class="lg:mt-12">
                    <div class=" lg:mt-8 lg:p-4 mt-2 mb-5 text-primary">
                        <h3 class="mt-2  lg:max-w-md lg:text-3xl font-semibold">
                            Beberapa Dokumentasi Dari Kegiatan Kami
                        </h3>
                        <h3 class="lg:text-3xl font-semibold mt-5">
                            <div class="">
                                <a href=""
                                    class="hover:animate-wiggle focus:animate-none font-semibold inline-block border border-primary text-primary py-2 px-5 rounded-md hover:bg-primary hover:text-white text-sm transition duration-500">
                                    Lihat Lebih Banyak
                                </a>
                            </div>
                        </h3>
                    </div>
                </div>

                @foreach ($galerySection->take(3) as $galery)
                    <div data-aos="zoom-in" class="bg-white rounded-lg lg:m-3 shadow-lg">
                        <a href="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                            data-lightbox="gallery" data-title="{{ $galery->title }}">
                            <img src="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                alt="{{ $galery->title }}" class="w-full rounded-md h-80 object-cover">

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
<!-- Gallery Section -->

<!-- Client Section -->
<section id="client" class="bg-lightblue py-6 mt-10 w-full">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <p class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl text-center">
                <span class="text-primary">Klien Kami</span>
            </p>
            <p class="mt-2 text-lg leading-8 font-bold text-gray-600 text-center">
                <span class="text-primary sm:text-1xl">
                    KAMI TELAH MELAYANI BANYAK KLIEN
                </span>
            </p>
        </div>
        <div class="relative mt-2 swiper-container swiper-klien-kami rounded-md">
            <div class="swiper-wrapper mb-12">
                @foreach ($clientSection as $client)
                    <div class="swiper-slide overflow-hidden mb-4 flex-grow flex justify-center mx-auto h-auto">
                        <img src="{{ asset('storage/uploads/client-section/' . $client->image_path) }}"
                            alt="Client 1" class="object-contain h-52 max-w-full">
                    </div>
                @endforeach
            </div>
            
            <div class="text-primary mt-10 absolute swiper-pagination"></div>
            
        </div>
    </div>
</section>
<!-- Client Section -->

@include('partials.footer')

@include('partials.end')
