@extends('admin.layouts.main')

@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.toast')
            @include('admin.partials.recrut-bread')
            <form method="POST" action="{{ route('admin.recruitment.AdminStore') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white shadow-lg p-6 border rounded-lg max-w-full mx-auto my-6">
                    <h3 class="text-blue-700 text-lg font-semibold mb-4"><i class="fa-solid fa-caret-right"></i>&nbsp;Tambah
                        Data Rekrutmen</h3>
                    <hr class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="my-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span
                                    class="text-red-600">*</span></label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan alamat email" required />
                            <x-input-error :messages="$errors->get('email')" class="my-1" />

                        </div>

                        <div class="my-3">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">No. Hp/Wa <span
                                    class="text-red-600">*</span></label>
                            <input type="number" name="phone_number" id="phone_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan No. Telp" required />
                        </div>

                        <div class="my-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap <span
                                    class="text-red-600">*</span></label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Nama Lengkap" required />
                        </div>

                        <div class="my-3">
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK/Nomor Induk
                                Penduduk</label>
                            <input type="number" name="nik" id="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan NIK/Nomor Induk Kependudukan" />
                        </div>

                        <div class="my-3">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat <span
                                    class="text-red-600">*</span></label>
                            <textarea name="address" id="address" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Alamat" required></textarea>
                        </div>

                        <div class="my-3">
                            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Gaji Yang DiHarapkan
                                <span class="text-red-600">*</span></label>
                            <input type="number" name="salary" id="salary"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Harapan Gaji" required />
                        </div>

                        <div class="my-3">
                            <label for="study" class="block text-sm font-medium text-gray-700">Pendidikan <span
                                    class="text-red-600">*</span></label>
                            <select id="study" name="study" required
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Sekolah Lanjutan Tingkat Atas (SLTA)">Sekolah Lanjutan Tingkat Atas (SLTA)
                                </option>
                                <option value="Sekolah Menengah Kejuruan (SMK)">Sekolah Menengah Kejuruan (SMK)</option>
                                <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                                <option value="Strata 1 (S1)">Strata 1 (S1)</option>
                            </select>
                            <x-input-error :messages="$errors->get('study')" class="my-1" />
                        </div>

                        <div class="my-3">
                            <label for="position" class="block text-sm font-medium text-gray-700">Posisi Yang Dilamar <span
                                    class="text-red-600">*</span></label>
                            <select id="position" name="position" required
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Pilih Posisi Yang Dilamar</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="UI/UX Developer">UI/UX Developer</option>
                                <option value="Fullstack Developer">Fullstack Developer</option>
                                <option value="Mobile Developer">Mobile Developer</option>
                                <option value="DevOps Developer">DevOps Developer</option>
                                <option value="Quality Assurance">Quality Assurance</option>
                                <option value="Quality Control">Quality Control</option>
                                <option value="Accounting Staff / Tax Staff">Accounting Staff / Tax Staff</option>
                            </select>
                            <x-input-error :messages="$errors->get('position')" class="my-1" />
                        </div>

                        <div class="my-3">
                            <label for="onsite" class="block text-sm font-medium text-gray-700">Bersedia Onsite? <span
                                    class="text-red-600">*</span></label>
                            <select id="onsite" name="onsite" required
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="Iya">Iya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            <x-input-error :messages="$errors->get('onsite')" class="my-1" />
                        </div>

                        <div class="my-3">
                            <label for="test" class="block text-sm font-medium text-gray-700">Bersedia Di Test? <span
                                    class="text-red-600">*</span></label>
                            <select id="test" name="test" required
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="Iya">Iya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            <x-input-error :messages="$errors->get('test')" class="my-1" />
                        </div>

                        <div class="my-3">
                            <label for="agree" class="block text-sm font-medium text-gray-700">Kapan Bersedia Bergabung
                                <span class="text-red-600">*</span></label>
                            <input type="date" name="agree" id="agree"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            <x-input-error :messages="$errors->get('agree')" class="my-1" />
                        </div>

                        <div class="my-3">
                            <label for="portfolio" class="block text-sm font-medium text-gray-700">Portofolio</label>
                            <input type="text" name="portfolio" id="portfolio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="https://examples.com">
                            <x-input-error :messages="$errors->get('portfolio')" class="my-1" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label for="file_input" class="block text-sm font-medium text-gray-600 mb-2">
                                    Upload CV<span class="text-red-600 text-base">*</span></label>
                            </div>
                            <div class="relative bg-white">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" name="file_path" id="file_input" type="file"
                                    accept="application/pdf" required>
                                <x-input-error :messages="$errors->get('file_path')" class="my-1" />
                                <p class="mt-2 mx-1 text-xs text-center font-semibold text-red-600" id="file_input_help">
                                    Hanya file pdf. (MAX. 5MB).
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Kirim
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
