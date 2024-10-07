@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-2lg font-bold">
                                Tambah Acara
                            </h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="min-w-full">
                        <form action="{{ route('admin.events.store') }}" method="post" id="eventForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="overflow-hidden py-4 px-1">
                                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                                    <div class="rounded-lg col-span-10 lg:col-span-4">
                                        <div class="grid grid-cols-5 gap-2 lg:gap-3 mb-4">
                                            <div class="rounded col-span-5 lg:col-span-5 flex flex-col relative">
                                                <div class="w-full max-w-full">
                                                    <img id="image_preview" src="{{ asset('dist/images/no-image.png') }}"
                                                        class="rounded-lg">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="rounded col-span-5 lg:col-span-5 flex flex-col relative">
                                                <div class="w-full max-w-full">
                                                    <input name="image_path" id="file_input" type="file" required
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                                        aria-describedby="file_input_help" accept="image/*">
                                                    <p class="mt-1 text-sm font-semibold text-red-600" id="file_input_help">
                                                        Gambar (MAX. 4MB)
                                                    </p>
                                                    @if ($errors->has('image_path'))
                                                        <span
                                                            class="text-red-500 text-sm mt-1">{{ $errors->first('image_path') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('file_input').addEventListener('change', function(event) {
                                                const file = event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('image_preview').src = e.target.result;
                                                    }
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        </script>

                                        <div class="mt-3">
                                            <label for="description"
                                                class="block mb-2 text-base font-semibold text-gray-700">Deskripsi<span
                                                    class="text-red-600">*</span></label>
                                            <textarea name="description" id="description" placeholder="Tulis deskripsi acara di sini..." required
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-span-10 lg:col-span-6">
                                        <div class="grid grid-cols-10 gap-2 lg:gap-3">
                                            <div class="rounded col-span-10 lg:col-span-10 flex flex-col relative">
                                                <div class="w-full border border-gray-200 rounded-lg bg-gray-50">
                                                    <div class="px-3 py-2 border-b">
                                                        <div class="my-3">
                                                            <label for="judul"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Judul<span
                                                                class="text-red-600">*</span></label>
                                                            <input type="text" name="judul" id="judul" placeholder="Masukan Judul" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            @error('judul')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="my-3">
                                                            <label for="lokasi"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Lokasi<span
                                                                class="text-red-600">*</span></label>
                                                            <input type="text" name="lokasi" id="lokasi" placeholder="Masukan Lokasi" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            @error('lokasi')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="my-3">
                                                            <label for="waktu"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Waktu
                                                                Acara<span
                                                                class="text-red-600">*</span></label>
                                                            <input type="datetime-local" name="waktu" id="waktu"
                                                                required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            @error('waktu')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3">
                                                            <label for="type"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Tipe
                                                                Acara<span
                                                                class="text-red-600">*</span></label>
                                                            <select name="type" id="type" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                <option value="">Pilih Tipe Acara</option>
                                                                <option value="gratis">Gratis</option>
                                                                <option value="berbayar">Berbayar</option>
                                                            </select>
                                                            @error('type')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="harga"
                                                                class="block text-base font-semibold text-gray-700">Harga</label>
                                                            <input type="text" id="harga" name="harga"
                                                                placeholder="Masukkan harga"
                                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                                            @error('harga')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <script>
                                                            const typeSelect = document.getElementById('type');
                                                            const hargaInput = document.getElementById('harga');

                                                            function formatRupiah(value) {
                                                                const numberString = value.replace(/[^,\d]/g, '').toString();
                                                                const split = numberString.split(',');
                                                                const sisa = split[0].length % 3;
                                                                let rupiah = split[0].substr(0, sisa);
                                                                const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                                                if (ribuan) {
                                                                    const separator = sisa ? '.' : '';
                                                                    rupiah += separator + ribuan.join('.');
                                                                }

                                                                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                                return 'Rp ' + rupiah;
                                                            }

                                                            typeSelect.addEventListener('change', function() {
                                                                if (this.value === 'gratis') {
                                                                    hargaInput.value = '';
                                                                    hargaInput.disabled = true;
                                                                } else {
                                                                    hargaInput.disabled = false;
                                                                }
                                                            });

                                                            hargaInput.addEventListener('keyup', function(e) {
                                                                hargaInput.value = formatRupiah(this.value);
                                                            });

                                                            document.getElementById('eventForm').addEventListener('submit', function(e) {
                                                                if (typeSelect.value === 'gratis') {
                                                                    hargaInput.value = '0';
                                                                } else {
                                                                    let rawValue = hargaInput.value.replace(/[^,\d]/g, '');
                                                                    hargaInput.value = parseFloat(rawValue.replace(/,/g, ''));
                                                                }
                                                            });
                                                        </script>


                                                        <div class="my-3">
                                                            <label for="pilihan_sesi"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Jumlah
                                                                Sesi<span
                                                                class="text-red-600">*</span></label>
                                                            <select name="pilihan_sesi" id="pilihan_sesi" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                <option value="">Pilih Sesi</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                            @error('pilihan_sesi')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3">
                                                            <label for="kategori"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Kategori
                                                                atau Topik<span
                                                                class="text-red-600">*</span></label>
                                                            <input type="text" name="kategori" id="kategori" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            @error('kategori')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3">
                                                            <label for="status_quota"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Status
                                                                Kuota<span
                                                                class="text-red-600">*</span></label>
                                                            <select name="status_quota" id="status_quota" required
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                onchange="toggleQuotaInput()">
                                                                <option value="">Pilih Status Kuota</option>
                                                                <option value="unlimited">Unlimited</option>
                                                                <option value="limited">Limited</option>
                                                            </select>
                                                            @error('status_quota')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3">
                                                            <label for="quota"
                                                                class="block mb-2 text-base font-semibold text-gray-700">Kuota</label>
                                                            <input type="number" name="quota" id="quota"
                                                                min="1"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            @error('quota')
                                                                <span
                                                                    class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <script>
                                                            function toggleQuotaInput() {
                                                                const statusQuota = document.getElementById('status_quota').value;
                                                                const quotaInput = document.getElementById('quota');

                                                                if (statusQuota === 'unlimited') {
                                                                    quotaInput.value = '';
                                                                    quotaInput.disabled = true;
                                                                } else {
                                                                    quotaInput.disabled = false;
                                                                }
                                                            }

                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                toggleQuotaInput();
                                                            });
                                                        </script>


                                                        <button type="submit" id="updateButton"
                                                            class="my-1 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                                                            Kirim
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
