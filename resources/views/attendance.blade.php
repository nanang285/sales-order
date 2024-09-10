<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi Karyawan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Data Absensi Karyawan</h1>

        @if($fingerprints->isEmpty())
            <p>Data absensi tidak ditemukan.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID Karyawan</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Jam Masuk</th>
                        <th class="py-2 px-4 border-b">Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fingerprints as $fingerprint)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $fingerprint->employee_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $fingerprint->entry_date }}</td>
                            <td class="py-2 px-4 border-b">{{ $fingerprint->entry_time }}</td>
                            <td class="py-2 px-4 border-b">{{ $fingerprint->exit_time ?? 'Belum Keluar' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
