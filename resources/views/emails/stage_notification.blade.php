<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Proses Recruitment</title>
</head>
<body>
    <p>Hai <b>{{ $recruitment->name }}</b>,</p>

@if ($status === 'success')
    <p>Selamat! Anda Telah Lolos dalam Seleksi {{ $stageDescription }}.</p>
@else
    <p>Mohon maaf, Anda tidak lolos dalam Seleksi {{ $stageDescription }}.</p>
@endif

<p>Terima kasih atas partisipasi Anda & Anda dapat memeriksa hasil 
    <a href="{{ url('/recruitment/checkrecruitment') }}" class="text-blue-500 hover:underline">di sini</a></p>
<p>


</body>
</html>