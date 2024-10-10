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
                    <div class="flex justify-center items-center">
                        <div
                            class="max-w-md w-full overflow-hidden shadow rounded border bg-white transition transform duration-300">
                            @if (isset($ticketData) && $ticketData)
                                <div class="absolute z-50 right-3 top-3 transform">
                                    <button onclick="downloadTicket()" data-tooltip-target="tooltip-download" type="button"
                                        class="bg-gray-500 text-white hover:bg-gray-600 hover:shadow-lg transition-transform duration-300 font-bold px-3 py-2 rounded-full">
                                        <i class="fa-solid fa-circle-down"></i>
                                    </button>

                                    <div id="tooltip-download" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 -left-32 top-1/2 transform -translate-y-1/2">
                                        Download
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <img class="w-full h-72 object-cover rounded-t-lg"
                                        src="{{ asset('storage/uploads/event/' . $ticketData->image_path) }}"
                                        alt="Gambar">
                                </div>
                                <div class="py-6 px-4 bg-white">
                                    <div class="font-extrabold text-center text-base text-gray-800 mb-4 uppercase">
                                        {{ $ticketData->jenis_produk }}</div>
                                    <p class="text-gray-700 text-center font-semibold text-sm mx-2 mb-6">
                                        Terima kasih atas partisipasi dan dukungannya.<br>Kami tunggu kehadiran Anda.
                                    </p>
                                    <div class="mx-4">
                                        <div class="flex justify-between mb-4">
                                            <p class="text-gray-600 text-base font-semibold">Nama Lengkap</p>
                                            <span class="text-gray-700 text-base">{{ $ticketData->nama_lengkap }}</span>
                                        </div>
                                        <div class="flex justify-between mb-4">
                                            <p class="text-gray-600 text-base font-semibold">Email</p>
                                            <span class="text-gray-700 text-base">{{ $ticketData->email }}</span>
                                        </div>
                                        <div class="flex justify-between mb-4">
                                            <p class="text-gray-600 text-base font-semibold">Perusahaan</p>
                                            <span class="text-gray-700 text-base">{{ $ticketData->nama_perusahaan }}</span>
                                        </div>
                                        <div class="flex justify-between mb-4">
                                            <p class="text-gray-600 text-base font-semibold">Jabatan</p>
                                            <span class="text-gray-700 text-base">{{ $ticketData->jabatan }}</span>
                                        </div>
                                        <div class="flex justify-between mb-4">
                                            <span class="text-gray-600 font-semibold text-sm">
                                                {{ \Carbon\Carbon::parse($ticketData->waktu)->translatedFormat('l, d F Y H:i') }}
                                            </span>
                                        </div>
                                    </div>
                                    <hr class="border-dashed border-gray-300 my-4">
                                    <p class="text-gray-500 text-center text-sm">
                                        Harap simpan tiket dengan baik dan jangan sampai hilang. Tiket diperlukan untuk
                                        memasuki acara.</p>
                                </div>
                            @else
                                <div class="text-center text-red-500 text-xl font-bold py-8">
                                    TIDAK ADA TIKET
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function downloadTicket() {
            const ticket = document.querySelector('.max-w-md');

            html2canvas(ticket).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');

                const now = new Date();
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const formattedDate = now.toLocaleString('id-ID', options).replace(/\/|,|:|\s/g, '-');

                link.download = `ZMI_Event-${formattedDate}.png`;
                link.click();
            });
        }
    </script>
    </div>
@endsection
