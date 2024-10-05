<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen Multimedia Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            font-family: 'Urbanist', sans-serif;
        }
    </style>
</head>

<body class="flex justify-center items-center bg-gray-100">

    <div class="max-w-md w-full rounded overflow-hidden shadow-lg bg-white">
        @if(isset($ticketData) && $ticketData)
            <img class="w-full" src="{{ asset('storage/uploads/event/' . $ticketData->image_path) }}" alt="Gambar">
            <div class="py-4">
                <div class="font-bold text-center text-lg mb-2">ZEN MULTIMEDIA EXPO 2024</div>
                <hr class="border-dashed border border-gray-600 mb-2">
                <p class="text-gray-700 text-center font-bold text-sm mx-2 mb-4">
                    Terima kasih atas dukungan nya, Kami tunggu kehadiran Anda.
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
                        <p class="text-gray-600 text-base font-bold">{{ $ticketData->type }}</p>
                        <span class="text-gray-600 font-semibold text-lg">Rp {{ number_format($ticketData->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 font-bold text-sm">{{ $ticketData->waktu }}</span>
                        <span class="text-gray-600 font-bold text-sm">{{ $ticketData->alamat }}</span>
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

    @if(isset($ticketData) && $ticketData)
    <div class="flex justify-center mt-4">
        <button onclick="downloadTicket()" class="bg-green-500 text-white font-bold py-2 px-4 rounded ml-2">
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
                const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit' };
                const formattedDate = now.toLocaleString('id-ID', options).replace(/\/|,|:|\s/g, '-');
                
                link.download = `ZMI_Event-${formattedDate}.png`;
                link.click(); 
            });
        }
    </script>
      

</body>

</html>
