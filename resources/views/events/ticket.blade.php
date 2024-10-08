@extends('layouts.main')
@section('container')
    @include('components.preloader')

    <div class="flex justify-center items-center min-h-screen"> <!-- Flexbox untuk pusat halaman -->
        <div class="max-w-md w-full overflow-hidden shadow-lg rounded-lg border bg-white">
            @if (isset($ticketData) && $ticketData)
                <img class="w-full" src="{{ asset('storage/uploads/event/' . $ticketData->image_path) }}" alt="Gambar">
                <div class="py-4">
                    <div class="font-bold text-center text-lg mb-2">ZEN MULTIMEDIA EXPO 2024</div>
                    <hr class="border-dashed border border-gray-600 mb-2">
                    <p class="text-gray-700 text-center font-bold text-sm mx-2 mb-0">
                        Terima kasih atas partisipasi dan dukungannya.
                    </p>
                    <p class="text-gray-700 text-center font-bold text-sm mx-2 mb-4">
                        Kami tunggu kehadiran Anda.
                    </p>
                    <div class="mx-4">
                        <div class="flex justify-between mb-2">
                            <p class="text-gray-600 text-base font-bold">Nama Lengkap:</p>
                            <span class="text-gray-600 text-base">{{ $ticketData->nama_lengkap }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-gray-600 text-base font-bold">Email:</p>
                            <span class="text-gray-600 text-base">{{ $ticketData->email }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-gray-600 text-base font-bold">Nama Perusahaan:</p>
                            <span class="text-gray-600 text-base">{{ $ticketData->nama_perusahaan }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <p class="text-gray-600 text-base font-bold">Jabatan:</p>
                            <span class="text-gray-600 text-base">{{ $ticketData->jabatan }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <p class="text-gray-600 text-base font-bold">Harga Tiket :</p>
                            <span class="text-gray-600 font-semibold text-lg">Rp
                                {{ number_format($ticketData->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 font-bold text-sm">
                                {{ \Carbon\Carbon::parse($ticketData->waktu)->translatedFormat('l, d F Y H:i') }}
                            </span>
                        </div>
                    </div>
                    <hr class="border-dashed border border-gray-600 my-2">
                    <p class="text-gray-600 text-center text-sm">Harap simpan tiket ini dan Jangan sampai hilang.</p>
                </div>
            @else
                <div class="text-center text-red-500 text-xl font-bold py-4">
                    TIDAK ADA TIKET
                </div>
            @endif
        </div>
        @if (isset($ticketData) && $ticketData)
            <div class="flex justify-center">
                <button onclick="downloadTicket()"
                    class="bg-green-500 text-base text-white hover:scale-105 font-bold py-2 px-3 rounded ml-2">
                    Download Tiket
                </button>
            </div>
        @endif
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
