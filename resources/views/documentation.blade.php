@include('partials.start')
@include('partials.navbar')

<div id="preloader" class="fixed inset-0 bg-gray-800 bg-opacity-80 flex items-center justify-center z-50">
    <div class="absolute animate-spin rounded-full h-28 w-28 border-t-4 border-b-4 border-blue-500"></div>
    <img src="{{ asset('favicon.ico') }}" class="rounded-full h-20 w-20">
</div>

<div class="relative">
    <div id="about" class="bg-fixed bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('images/20190801143905-GettyImages-1128215665.jpeg') }}')">
        <div class="relative max-h-screen py-24 lg:py-52 bg-gray-900 bg-opacity-90">
            <div class="mx-auto max-w-4xl">
                <div class="flex justify-center">
                    <div class="mx-4 relative rounded-full px-3 mt-4 py-1 text-sm leading-6 text-gray-600">
                        <div class="flex" id="shadow"></div>
                        <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white sm:text-6xl">
                            Yuk Lihat Dokumentasi Dari Berbagai Kegiatan Kami
                        </h1>
                        <p class="mt-6 text-base lg:text-xl leading-8 text-center text-gray-200">
                            Kami di PT Zen Multimedia telah terlibat dalam berbagai kegiatan dan proyek yang
                            mencerminkan komitmen kami dalam memberikan solusi IT terbaik. Berikut adalah beberapa
                            dokumentasi dari kegiatan yang telah kami lakukan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="w-full mb-12">
    <div class=" lg:py-6">
        <div class=" container mx-auto px-6 lg:px-8">
            <div class="mx-auto max-w-full lg:text-center">
                <p class="my-5 mb-7 text-3xl font-bold tracking-tight text-gray-900 text-center">
                    <span class="text-primbary">Dokumentasi Kegiatan Kami</span>
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-2">
                @foreach ($galerySection as $galery)
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                        class="bg-white rounded-lg lg:m-3 shadow-lg">
                        <a href="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                            data-lightbox="gallery" data-title="{{ $galery->title }}">
                            <img src="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                alt="{{ $galery->title }}" class="w-full rounded-md h-64 lg:h-80 object-cover">
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
@include('partials.banner')
@include('partials.footer')
@include('partials.end')
