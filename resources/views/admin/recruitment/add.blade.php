@extends('admin.layouts.main')

@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.toast')
            @include('admin.partials.recrut-bread')
            <form method="POST" action="{{ route('admin.recruitment.AdminStore') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-10 gap-4">
                    <div class="bg-white shadow-lg p-6 border rounded-lg col-span-10 my-6">
                        <div class="mb-7">
                            <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;Tambah Data Rekrutmen</h3>
                        </div>
                        <hr>
                        <div class="grid grid-cols-2 gap-4 mt-3">
                            <div class="my-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email<span
                                        class="text-red-600 text-base">*</span></label>
                                <input type="email" name="email" id="email"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan alamat email" required value="" />
                            </div>

                            <div class="my-3">
                                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No.Hp/Wa<span
                                        class="text-red-600 text-base">*</span></label>
                                <input type="number" name="phone_number" id="no_telp"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan No.Telp" required value="" />
                            </div>

                            <div class="my-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap<span
                                        class="text-red-600 text-base">*</span></label>
                                <input type="text" name="name" id="name"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan Nama Lengkap" required value="" />
                            </div>

                            <div class="my-3">
                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK/Nomor Induk
                                    Penduduk</label>
                                <input type="number" name="nik" id="nik"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan NIK/Nomor Induk Kependudukan" value="" />
                            </div>

                            <div class="my-3">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat<span
                                        class="text-red-600 text-base">*</span></label>
                                <textarea name="address" id="address" rows="4"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm h-10 max-h-20 rounded-md focus:ring-blue-500 focus:border-blue-500 
                                       block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan Alamat" required></textarea>
                            </div>

                            <div class="my-3">
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">
                                    Gaji Yang DiHarapkan<span class="text-red-600 text-base">*</span>
                                </label>
                                <input type="number" name="salary" id="salary"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full max-w-xl p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan Harapan Gaji" required value="" />
                            </div>

                            <div class="my-3">
                                <label for="study" class="block text-sm font-medium text-gray-700">
                                    Pendidikan<span class="text-red-600 text-base">*</span></label>
                                <select id="study" name="study"
                                    class="mt-1 block w-full max-w-xl px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm"
                                    onchange="toggleOtherEducation(this)">
                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                    <option value="Sekolah Lanjutan Tingkat Atas (SLTA)">Sekolah Lanjutan Tingkat Atas
                                        (SLTA)</option>
                                    <option value="Sekolah Menengah Kejuruan (SMK)">Sekolah Menengah Kejuruan (SMK)</option>
                                    <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                                    <option value="Strata 1 (S1)">Strata 1 (S1)</option>
                                </select>
                                <x-input-error :messages="$errors->get('study')" class="my-1" />
                            </div>

                            <div class="my-3">
                                <label for="position" class="block text-sm font-medium text-gray-700">
                                    Posisi Yang Dilamar<span class="text-red-600 text-base">*</span></label>
                                <select id="position" name="position"
                                    class="mt-1 block w-full max-w-xl px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
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
                        </div>

                        <div class="grid grid-cols-4">
                            <div class="flex items-center justify-center w-full max-w-xl">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    @if (isset($uploadedFile))
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">File uploaded:
                                                {{ $uploadedFile->getClientOriginalName() }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">(MAX. 2MB)</p>
                                        </div>
                                    @else
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 2MB)</p>
                                        </div>
                                    @endif
                                    <input id="dropzone-file" name="file_path" type="file" class="hidden"
                                        accept="application/pdf" />
                                </label>
                            </div>
                        </div>


                        <button type="submit" id="updateButton"
                            class="mt-4 right-0 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                            Kirim
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
