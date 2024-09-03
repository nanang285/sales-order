@extends('layouts.main')
@section('container')
    @include('layouts.navbar')

    <div class="relative">
        <div class="bg-fixed bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('dist/images/homepages/zmi-bg-aboutme.jpg') }}')">
            <div class="relative max-h-screen py-28 lg:py-56 bg-gray-900 bg-opacity-90">
                <div class="mx-auto max-w-4xl">
                    <div class="flex justify-center">
                        <div class="mx-4 relative rounded-full px-3 mt-12 lg:mt-0 text-sm leading-6">
                            <div class="hidden lg:flex" id="shadow"></div>
                            <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white sm:text-6xl">
                                Ayo, Kenali Kami Lebih Dekat!
                            </h1>
                            <p class="mt-6 text-lg lg:text-xl leading-8 text-center text-gray-200">
                                Bergabunglah dengan PT Zen Multimedia, perusahaan IT yang siap membantu Anda dalam pembuatan
                                website, aplikasi, dan multimedia.
                                Kami adalah tim berpengalaman yang siap memberikan layanan terbaik untuk pemerintahan, UMKM,
                                perusahaan swasta,
                                dan perseorangan. Yuk, wujudkan ide Anda bersama kami!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="w-full relative">
        <div class="lg:py-8 relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-8 relative">
                <div class="flex lg:mb-16 flex-col md:flex-row">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="md:w-1/2 p-6">
                        <h2 class="text-primary text-3xl font-bold mb-4">Tentang Kami!</h2>
                        <p class="mb-3 text-gray-900 text-lg font-semibold">
                            Kami PT Zen Multimedia adalah perusahaan IT yang berfokus pada pembuatan website, aplikasi, dan
                            multimedia. Berbasis di Purwakarta, kami terdiri dari tim berpengalaman yang memberikan layanan
                            purna jual terbaik. Kami melayani pemerintahan, UMKM, swasta, dan perseorangan.
                        </p>
                        <p class="text-base font-bold">
                            Dan kini kami mempunya beberapa layanan unggulan seperti :
                        </p>
                        <ul class="list-disc text-base font-semibold list-inside mt-4">
                            <li>Website Pemerintah Daerah Purwakarta</li>
                            <li>Aplikasi Manajemen UMKM</li>
                            <li>Platform E-Learning Swasta</li>
                            <li>Multimedia Presentasi Perusahaan</li>
                            <li>Aplikasi Reservasi Restoran</li>
                            <li>Website E-Commerce</li>
                        </ul>
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="mt-8 md:w-1/2">
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <div class="relative h-56 overflow-hidden rounded-md lg:rounded-lg md:h-96">
                                @foreach ($galerySection as $galery)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                            class="absolute object-cover block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="zmi-slider-1">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button"
                                class="absolute top-0 -right-12 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-blue-600 group-hover:bg-blue-600 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <span class="text-white"><i class="fas fa-arrow-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 p-6 mt-8">
                        <h2 class="text-2xl font-bold mb-3">Visi Misi Kami</h2>
                        <p class="mb-3 text-2xl font-normal">
                            Menjalankan Business Work Digital di era 4.0
                            melalui prinsip Generator Kreativitas Sumber
                            Daya Manusia (SDM)
                        </p>
                        <li class="mb-3 text-lg font-bold">
                            Menciptakan lapangan pekerjaan bagi sumber daya manusia yang mumpuni dalam bidang teknologi
                        </li>
                        <li class="mb-3 text-lg font-bold">
                            Melakukan kajian-kajian dengan
                            menerapkan prinsip keilmiahan serta
                            solusi yang kreatif dan inovatif
                        </li>
                        <li class="mb-3 text-lg font-bold">
                            Meningkatkan kapasitas kelembagaan
                            sumber daya manusia , kualitas penelitian dan
                            pengembangan dalam penyelenggaraan
                            capacity, building serta mendorong pemanfaatannya melalui pendidikan dan pelatihan
                        </li>
                        <li class="mb-3 text-lg font-bold">
                            Menghasilkan produk-produk yang baik, bermutu
                            dan berkualitas sesuai dengan standar yang berlaku
                            baik nasional maupun iternasional
                        </li>
                    </div>
                    <div class="md:w-1/2 flex items-center justify-center p-6">
                        <div class="w-full max-w-sm">
                            <img src="{{ asset('dist/images/visi-misi.png') }}" alt="Deskripsi Gambar"
                                class="w-full h-auto">
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/absolute3.png') }}" class="absolute -bottom-24 -left-10 lg:w-1/4 max-w-xs"
                    alt="Absolute 3">
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
