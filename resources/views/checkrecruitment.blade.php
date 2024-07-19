<form action="{{ route('checkrecruitment.search') }}" method="POST">
    @csrf
    <input required type="email" name="email" placeholder="Masukkan email...">
    <button type="submit">Cari</button>
</form>
@if(isset($recruitment) && count($recruitment) > 0)
    <h2>Hasil Pencarian</h2>
    <ul>
        @foreach($recruitment as $recruitments)
            <li>Nama: {{ $recruitments->name }}</li>
            <li>NIK: {{ $recruitments->nik }}</li>
            <li>Alamat: {{ $recruitments->address }}</li>
            <li>Nomor Telepon: {{ $recruitments->phone_number }}</li>
            <li>Pendidikan: {{ $recruitments->study }}</li>
            <li>Posisi: {{ $recruitments->position }}</li>
            <li>Gaji: {{ $recruitments->salary }}</li>
            <li>Path File: {{ $recruitments->file_path }}</li>

            proses seleksi
            <li>Cek CV: {{ $recruitments->stage1 }}</li>
            <li>Test Project: {{ $recruitments->stage2 }}</li>
            <li>Tahap Interview: {{ $recruitments->stage3 }}</li>
            <li>Tahap Offering: {{ $recruitments->stage4 }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada hasil pencarian dengan email tersebut.</p>
@endif
