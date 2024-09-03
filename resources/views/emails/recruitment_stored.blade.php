<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Stored</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-2xl font-bold mb-4">Data Rekrutmen Telah Diterima dari,</h3>
        <div class="space-y-4">
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>👤 Nama:</strong></span> 
                <span>{{ $name }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📧 Email:</strong></span> 
                <span>{{ $email }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>🆔 NIK:</strong></span> 
                <span>{{ $nik }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📞 No. Telp:</strong></span> 
                <span>{{ $phone_number }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>🏠 Alamat:</strong></span> 
                <span>{{ $address }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>🎓 Pendidikan Terakhir:</strong></span> 
                <span>{{ $study }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>💼 Posisi Di Lamar:</strong></span> 
                <span>{{ $position }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📍 Bersedia Onsite:</strong></span> 
                <span>{{ $onsite }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📝 Bersedia Di Test:</strong></span> 
                <span>{{ $test }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📅 Kapan Bersedia Bergabung:</strong></span> 
                <span>{{ \Carbon\Carbon::parse($agree)->translatedFormat('d F Y') }}</span>
            </p>            
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>💰 Harapan Gaji:</strong></span> 
                <span>{{ $salary }}</span>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>🔗 Portfolio:</strong></span> 
                <a href="{{ $portfolio }}" class="text-blue-500 hover:underline" target="_blank">Lihat Portfolio</a>
            </p>
            <p class="flex items-center">
                <span class="font-semibold mr-2"><strong>📄 File CV:</strong></span> 
                <a href="{{ asset('storage/uploads/recruitment/' . $file_path) }}" class="text-blue-500 hover:underline" download>Lihat CV</a>
            </p>
        </div>
    </div>
</body>
</html>
