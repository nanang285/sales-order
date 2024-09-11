@extends('layouts.main')
@section('container')
    @include('layouts.navbar')
    @include('components.preloader')

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
                <div class="flex flex-col md:flex-row lg:mb-16 items-center">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="md:w-1/2 p-6 space-y-6">
                        <h2 class="text-primary text-3xl font-bold mb-4 underline decoration-wavy decoration-blue-900">Tentang Kami</h2>
                        <p class="mb-3 text-gray-900 text-lg font-semibold" style="text-align: justify;">
                            Kami PT Zen Multimedia adalah perusahaan IT yang berfokus pada pembuatan website, aplikasi, dan multimedia. 
                            Berbasis di Purwakarta, kami terdiri dari tim berpengalaman yang memberikan layanan purna jual terbaik. 
                            Kami melayani pemerintahan, UMKM, swasta, dan perseorangan.
                        </p>                     
                        <p class="text-lg font-bold text-blue-900">
                            Kami menyediakan beberapa layanan unggulan seperti:
                        </p>
                        <ul class="list-disc text-lg font-semibold list-inside mt-4 space-y-2 text-gray-700" style="text-align: justify;">
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Sistem manajemen stasiun pengisian daya kendaraan listrik</li>
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Super Apps Pelayanan Publik</li>
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Aplikasi Manajemen UMKM</li>
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Platform E-Learning Swasta</li>
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Multimedia Presentasi Perusahaan</li>
                            <li class="transition duration-300 hover:text-blue-600 hover:underline">Website E-Commerce</li>
                        </ul>
                    </div>
                
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="mt-8 md:w-1/2">
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <div class="relative h-56 overflow-hidden rounded-md lg:rounded-lg md:h-96 shadow-lg">
                                @foreach ($galerySection as $galery)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('storage/uploads/galery-section/' . $galery->image_path) }}"
                                            class="absolute object-cover block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 transition-transform transform hover:scale-105"
                                            alt="zmi-slider-1">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button"
                                class="absolute top-0 -right-12 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-blue-600 group-hover:bg-blue-700 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none shadow-lg">
                                    <span class="text-white"><i class="fas fa-arrow-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>                
                <div data-aos="fade-up" data-aos-anchor-placement="top-center" class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="md:w-1/2 p-6 md:p-8 mt-8 md:mt-0">
                        <h2 class="text-2xl font-extrabold mb-4 text-primary border-b-4 border-blue-900 border-opacity-70 inline-block">
                            Visi & Misi Kami
                        </h2>
                        <p class="mb-6 text-lg md:text-xl font-light text-blue-900 leading-relaxed" style="text-align: justify;">
                            Menjadi pemimpin dalam industri pengembangan perangkat lunak di Asia Tenggara dengan menyediakan solusi teknologi yang inovatif, andal, dan berkelanjutan, yang mendukung transformasi digital dan keberhasilan bisnis klien kami.
                        </p>                        
                        <ul class="list-outside list-disc pl-6 space-y-4">
                            <li class="text-base md:text-lg font-semibold text-gray-700" style="text-align: justify;">
                                Mengembangkan produk dan layanan perangkat lunak yang berfokus pada kebutuhan pelanggan dan mampu menjawab tantangan teknologi masa kini.
                            </li>
                            <li class="text-base md:text-lg font-semibold text-gray-700" style="text-align: justify;">
                                Menyediakan solusi teknologi yang scalable dan user-friendly, yang dapat beradaptasi dengan perubahan dan pertumbuhan bisnis.
                            </li>
                            <li class="text-base md:text-lg font-semibold text-gray-700" style="text-align: justify;">
                                Membangun hubungan jangka panjang dengan klien melalui komitmen terhadap kualitas, integritas, dan pelayanan pelanggan yang unggul.
                            </li>
                            <li class="text-base md:text-lg font-semibold text-gray-700" style="text-align: justify;">
                                Mendorong inovasi berkelanjutan dalam pengembangan teknologi dengan memanfaatkan tren terbaru dan praktik terbaik di industri.
                            </li>
                            <li class="text-base md:text-lg font-semibold text-gray-700" style="text-align: justify;">
                                Memberikan kontribusi positif terhadap masyarakat dan lingkungan melalui penerapan teknologi yang berkelanjutan dan ramah lingkungan.
                            </li>
                        </ul>                        
                    </div>
                
                    <div class="md:w-1/2 flex items-center justify-center bg-blue-50">
                        <div class="w-full max-w-md">
                            <img src="{{ asset('dist/images/visi-misi.png') }}" alt="Deskripsi Gambar" class="w-full h-auto rounded-lg">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="w-full relative bg-gray-100 py-12">
        <div class="py-8 relative overflow-hidden">
            <div class="container mx-auto px-6 lg:px-8 relative">
                <div class="relative mx-auto max-w-full lg:text-center mb-12">
                    <p class="absolute no-select inset-0 text-6xl lg:text-8xl font-extrabold text-gray-300 opacity-30 tracking-tighter text-center z-0 transform -translate-y-6 lg:-translate-y-7">
                        OUR TEAM
                    </p>
                    <p class="relative no-select text-3xl lg:text-4xl font-extrabold tracking-tight text-gray-900 text-center z-10">
                        <span class="text-primary">Meet Our Team</span>
                    </p>
                    <p class="mt-4 text-center text-lg font-light text-gray-600 max-w-3xl mx-auto">
                        Kami memiliki tim yang terdiri dari para profesional berpengalaman di bidangnya, 
                        yang bekerja sama untuk mewujudkan Visi & Misi perusahaan kami.
                    </p>
                </div>
    
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 xl:grid-cols-6 justify-center items-center">
                    @foreach ($ourTeam as $team)
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center"
                            class="relative max-w-72 rounded-xl bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                            <img class="object-cover shadow w-full h-auto transform transition-transform duration-300 ease-in-out group-hover:scale-105 lg:group-hover:scale-110"
                                src="{{ asset('storage/uploads/our-team/' . ($team->image_path ?? '')) }}" alt="zmi-team-images">
                            <div class="absolute top-2 left-2 p-2 bg-white rounded-full shadow-lg">
                                <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" class="w-14 h-auto">
                            </div>
                            <div class="absolute inset-x-0 py-4 bottom-5 flex flex-col items-center justify-center bg-gradient-to-t bg-gray-800 bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-center text-xl font-semibold mb-1">{{ $team->title }}</p>
                                <p class="text-white text-center text-lg font-normal">{{ $team->role }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    @include('partials.banner')
    @include('components.chatbubble')
    @include('partials.footer')
@endsection
