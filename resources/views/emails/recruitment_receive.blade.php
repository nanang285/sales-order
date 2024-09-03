<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekrutmen Diterima</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 p-6">
    <div class="container mx-auto flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-lg w-full">
            <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-green-500 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 3v18m9-9H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p class="text-lg font-bold">Halo, <b>{{ $name }}</b></p>
            </div>
            <p class="text-base mb-4">
                Data lamaran Anda telah kami terima.
            <p class="text-base mb-4">
                Mohon untuk menunggu informasi selanjutnya & Anda dapat memeriksa hasil seleksi 
                <a href="{{ url('/recruitment/checkrecruitment') }}" class="text-blue-500 hover:underline">di sini</a>
            </p>
        </div>
    </div>
</body>

</html>
