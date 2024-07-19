@include('partials.start')
<div id="about" class="h-full bg-fixed bg-cover bg-no-repeat p-4 md:py-16"
    style="background-image: url('{{ asset('images/bg-about.webp') }}')">
    <section class="mx-auto max-w-[800px] lg:px-6">
        <div class="container mx-auto px-0 md:px-10">
            <div class="py-5 px-6 lg:p-8 md:max-w-none lg:flex flex-col rounded ring-1 bg-white ring-gray-200 shadow-lg">
                <div class="flex mb-5 flex-wrap justify-center sm:justify-start">
                    <div class="left-0 mr-1">
                        <img src="{{ asset('images/zenmultimedia.png') }}" alt="Logo" class="w-full h-12 lg:h-14">
                    </div>
                    <div class="sm:ml-auto mt-1 text-center">
                        <h1 class="text-base lg:text-lg font-bold text-blue-700">FORMULIR LAMARAN KERJA</h1>
                        <p class="text-xs lg:font-semibold text-blue-700">PT ZEN MULTIMEDIA INDONESIA</p>
                    </div>
                </div>
                <hr>
                <div class="flex items-center justify-center mt-4">
                    <p class="text-sm text-center md:max-w-md lg:max-w-full font-semibold text-red-600">
                        Mohon mengirimkan data yang sesuai dan tidak ada salah input atau typo.
                    </p>
                </div>
                <div class=" w-full">
                    <form class="space-y-6" action="{{ route('recruitment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Email<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukan Alamat Email Anda">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="my-1" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="block text-sm font-medium text-gray-600 mb-2">Nama Lengkap<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-signature"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="my-1" />
                        </div>                        

                        <div class="mb-3">
                            <label for="nik" class="block text-sm font-medium text-gray-600 mb-2">Nomor Induk Kependudukan / NIK<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-address-card"></i>
                                    </span>
                                </div>
                                <input type="text" name="nik" id="nik"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukan NIK Anda">
                            </div>
                            <x-input-error :messages="$errors->get('nik')" class="my-1" />
                        </div>
                        

                        <div class="mb-3">
                            <label for="address" class="block text-sm font-medium text-gray-600 mb-2">Alamat<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </span>
                                </div>
                                <input type="text" name="address" id="address"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukan Alamat Lengkap Anda">
                            </div>
                            <x-input-error :messages="$errors->get('address')" class="my-1" />
                        </div>
                        

                        <div class="mb-3">
                            <label for="phone_number" class="block text-sm font-medium text-gray-600 mb-2">No.Telp/HP/WA<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukan No.Telp/HP/WA Anda">
                            </div>
                            <x-input-error :messages="$errors->get('phone_number')" class="my-1" />
                        </div>
                        
                        <div>
                            <label for="study" class="block text-sm font-medium text-gray-700">
                                Pendidikan<span class="text-red-600 text-base">*</span></label>
                            <select id="study" name="study"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-sm"
                                onchange="toggleOtherEducation(this)">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Sekolah Lanjutan Tingkat Atas (SLTA)">Sekolah Lanjutan Tingkat Atas (SLTA)</option>
                                <option value="Sekolah Menengah Kejuruan (SMK)">Sekolah Menengah Kejuruan (SMK)</option>
                                <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                                <option value="Strata 1 (S1)">Strata 1 (S1)</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <x-input-error :messages="$errors->get('study')" class="my-1" />
                        </div>

                        <div id="otherEducationContainer" class="hidden mt-4">
                            <label for="study" class="block text-sm font-medium text-gray-700">
                                Pendidikan Lainnya</label>
                            <input type="text" id="study" name="study"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm"
                                placeholder="Masukkan pendidikan lainnya">
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700">
                                Posisi Yang Dilamar<span class="text-red-600 text-base">*</span></label>
                            <select id="position" name="position"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
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

                        <div class="mb-3">
                            <label for="salary" class="block text-sm font-medium text-gray-600 mb-2">Gaji Yang Diharapkan<span class="text-red-600 text-base">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-base text-blue-800">
                                        <i class="fa-solid fa-hand-holding-dollar"></i>
                                    </span>
                                </div>
                                <input type="text" name="salary" id="salary"
                                    class="bg-gray-50 border border-gray-300 text-blue-700 text-sm rounded-md block w-full pl-10 pr-2 py-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Gaji Yang Anda Harapkan">
                            </div>
                            <x-input-error :messages="$errors->get('salary')" class="my-1" />
                        </div>

                        <div class="mb-3">
                            <div class="relative">
                                <label for="file_input" class="block text-sm font-medium text-gray-600 mb-2">Kirim
                                    CV<span class="text-red-600 text-base">*</span></label>
                            </div>
                            <div class="relative bg-white">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" name="file_path" id="file_input" type="file">

                                    <x-input-error :messages="$errors->get('file_path')" class="my-1" />
                                    
                                <p class="mt-2 mx-1 text-xs text-center font-semibold text-red-600"
                                    id="file_input_help">
                                    jpeg, png, jpg, docx, doc, pdf. (MAX. 20MB).
                                </p>
                            </div>

                            <div class=" bg-white">
                                <p class="mt-5 mx-1 text-sm text-center font-semibold text-gray-600">
                                    Sudah Pernah mengirimkan Lamaran?, <a href="{{ route('checkrecruitment') }}" class="text-blue-600">Cek
                                        Status disini.</a>
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-between my-4">
                            <button type=""
                                class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Kirim
                            </button>
                            <button type="reset"
                                class="flex justify-center mt-2 text-sm md:text-base font-semibold">
                                <span class="text-blue-700">Kosongkan Formulir</span>
                            </button>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </section>
</div>
@include('partials.end')

<script>
    function toggleOtherEducation(select) {
        const otherEducationContainer = document.getElementById('otherEducationContainer');
        if (select.value === 'lainnya') {
            otherEducationContainer.classList.remove('hidden');
        } else {
            otherEducationContainer.classList.add('hidden');
        }
    }
</script>
