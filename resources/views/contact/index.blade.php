@include('partials.start')
@include('partials.navbar')

@include('admin.partials.toast')

<section class="w-full min-h-screen md:my-14 flex flex-col md:flex-row">
    <aside class="hidden md:block fixed w-full md:w-[36%] bg-[#1F2A7C] min-h-screen">
        <div class="h-full px-6 flex flex-col ml-8 justify-between">
            <div class="w-full mx-auto lg:px-6 my-5">

                <div class="max-w-full mt-16 mb-7">
                    <h3 class="xl:text-3xl text-lg font-semibold text-white space-y-0"> Hubungi Sales Solusi Bisnis Kami
                    </h3>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Telepon </p>
                    <p class="text-sm text-white space-y-0"> {{ $footerSection->no_telp }} </p>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Email </p>
                    <p class="text-sm max-w-full text-white space-y-0"> {{ $footerSection->email }} </p>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Alamat </p>
                    <p class="text-sm max-w-80 text-white space-y-0"> {{ $footerSection->alamat }} </p>
                </div>

                <div class="mb-3">
                    <p class="text-base  text-gray-300 space-y-0"> Sosial Media </p>
                    <a href="{{ $footerSection->sosmed_1 }}"
                        class="text-base block text-white hover:text-gray-300 space-y-0 justify-center items-center"
                        target="_blank"> <i class="fa-brands fa-facebook"></i>
                        <span class="text-sm">
                            Facebook
                        </span>
                    </a>
                    <a href="{{ $footerSection->sosmed_3 }}"
                        class="text-base block text-white hover:text-gray-300 space-y-0 justify-center items-center"
                        target="_blank"> <i class="fa-brands fa-youtube"></i>
                        <span class="text-sm">
                            Youtube
                        </span>
                    </a>
                    <a href="{{ $footerSection->sosmed_2 }}"
                        class="text-base block text-white hover:text-gray-300 space-y-0 justify-center items-center"
                        target="_blank"> <i class="fa-brands fa-instagram"></i>
                        <span class="text-sm">
                            Instagram
                        </span>
                    </a>
                </div>

            </div>
            <div class="mx-6 my-8 bottom-0">
                <span class="text-sm text-gray-400">Copyright by : zenmultimediacorp.com {{ date('Y') }}.</span>
            </div>

        </div>
    </aside>

    <main class="w-full md:pl-[300px] lg:pl-[480px] mb-4 md:mb-0 flex">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="mt-28 mb-12 lg:mt-20 mx-auto max-w-xl lg:text-center">
                <p class="mb-8 text-3xl font-bold tracking-tight text-gray-900 text-center">
                    <span class="text-primary">Hubungi Kami</span>
                </p>
                <p class="mb-1 md:text-base text-sm font-bold text-gray-600 text-center">
                    <span class="block text-primary">
                        Isi formulir dan anggota tim penjualan kami akan menghubungi Anda kembali dalam waktu 24 jam.
                    </span>
                </p>
            </div>

            <form method="post" action="{{ route('contact.store') }}" enctype="multipart/form-data"
                class=" max-w-[700px] mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium">Nama Lengkap *
                    </label>
                    <input type="text" id="name" name="name"
                        class="  focus:ring-blue-800 text-sm rounded-md block w-full p-2"
                        placeholder="Masukan Nama Lengkap" required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium  ">Email *
                    </label>
                    <input type="email" id="email" name="email"
                        class="shadow-sm   focus:ring-blue-800 text-sm rounded-md block w-full p-2"
                        placeholder="Masukan Email" required />
                </div>
                <div class="mb-5">
                    <label for="no_telepon" class="block mb-2 text-sm font-medium  ">No Telepon *
                    </label>
                    <input type="number" id="no_telepon" name="no_telp"
                        class="shadow-sm focus:ring-blue-800 text-sm rounded-md block w-full p-2"
                        placeholder="Masukan No Telepon" required />
                </div>
                <div class="mb-5">
                    <label for="message" class="block mb-2 text-sm font-medium ">Pesan *
                    </label>
                    <textarea name="message" id="message" rows="4" class="block p-2 w-full text-sm h-20 max-h-24 rounded-md border "
                        placeholder="Masukan pesan Anda"></textarea>
                </div>
                <div class="flex items-start my-5 ">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" value=""
                            class="w-4 h-4 text-primary border rounded  focus:none "
                            required />
                    </div>
                    <label for="terms"
                        class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"><p
                            class="text-black">Ya, saya setuju untuk menerima panggilan telepon</p></label>
                </div>
                <button type="submit"
                    class="text-lg text-primary rounded-md border font-bold border-primary hover:bg-primary hover:text-white 
                    px-10 p-1 text-center transition duration-300">
                    Kirim
                </button>
            </form>
        </div>
    </main>

    {{-- <aside class="md:block w-full lg:w-1/3 bg-[#1F2A7C] min-h-screen">
        <div class="h-full px-6 flex flex-col ml-8 justify-between">
            <div class="w-full max-w-full mx-auto lg:px-6 mt-20">
                <div class="max-w-56 mt-20 mb-6">
                    <h3 class="text-2xl font-bold text-white space-y-0"> Hubungi Sales Solusi Bisnis Kami </h3>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Telepon </p>
                <p class="text-sm text-white space-y-0"> {{ $footerSection->no_telp }} </p>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Email </p>
                    <p class="text-sm text-white space-y-0"> {{ $footerSection->email }} </p>
                </div>

                <div class="mb-3">
                    <p class="text-base font-semibold text-gray-300 space-y-0"> Alamat </p>
                    <p class="text-sm max-w-48 text-white space-y-0"> {{ $footerSection->alamat }} </p>
                </div>
            </div>
            <div class="text-center my-8 bottom-0">
                <span class="text-base text-gray-400">Copyright By: zenmultimediacorp.com</span>
            </div>

        </div>
    </aside> --}}

</section>

@include('partials.end')
