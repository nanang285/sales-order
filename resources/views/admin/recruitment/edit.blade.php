@extends('admin.layouts.main')

@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.toast')
            @include('admin.partials.recrut-bread')
            <div class="bg-white border shadow-sm rounded-lg  grid grid-cols-10 gap-3 lg:gap-4 my-6 p-8">
                <!-- Kolom Pertama -->
                <div class="rounded col-span-10 lg:col-span-4">
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Nama Lengkap :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->name }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Email :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->email }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">NIK :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            placeholder="-" value="{{ $recruitment->nik }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Alamat :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->address }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Bersedia onsite :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->onsite }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Kapan Bersedia Bergabung :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->agree }}">
                        </input>
                    </div>
                </div>

                <!-- Kolom Kedua -->
                <div class="rounded col-span-10 lg:col-span-4">
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">No.Telp/HP/WA :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->phone_number }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Pendidikan :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->study }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Posisi Yang Dilamar
                            :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->position }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Gaji Yang Diharapkan
                            :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->salary }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Bersedia di test :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->test }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Portofolio :</label>
                        <input class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2"
                            value="{{ $recruitment->portfolio }}">
                        </input>
                    </div>
                </div>

                <!-- Kolom Ketiga -->
                <div class="p-5 rounded col-span-10 lg:col-span-2">
                   
                    @if (!$recruitment->failed_stage)
                    <div class="mb-2 flex justify-between items-center">
                        <h3 class="text-gray-700 text-base font-semibold">Proses Seleksi :</h3>
                        <button id="editButton" class="bg-yellow-500 text-white text-sm px-3 py-1 rounded">Edit</button>
                    </div>
                @endif
                <ol
                    class="relative text-gray-500 border-s-2 left-5 border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li
                        class="flex flex-col mb-10 ms-10 {{ $recruitment->stage1 ? 'text-green-600' : ($recruitment->failed_stage === 'Check CV' ? 'text-red-600' : 'text-gray-500') }}">
                        <span
                            class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage1 ? 'bg-green-200' : ($recruitment->failed_stage === 'Check CV' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage1 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Check CV' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                            <i class="fa-regular fa-file-pdf"></i>
                        </span>
                        <h3 class="text-base font-semibold mt-3 items-center leading-tight">Cek CV</h3>
                        @if (!$recruitment->stage1 && !$recruitment->failed_stage)
                            <form action="{{ route('admin.recruitment.updateStage', [$recruitment->uuid, 'stage1']) }}"
                                method="POST">
                                @csrf
                                <button name="action" value="yes"
                                    class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Terima</button>
                                <button name="action" value="no"
                                    class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Tolak</button>
                            </form>
                        @endif
                    </li>

                    <li
                        class="flex flex-col mb-10 ms-10 {{ $recruitment->stage2 ? 'text-green-600' : ($recruitment->failed_stage === 'Test Project' ? 'text-red-600' : 'text-gray-500') }}">
                        <span
                            class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage2 ? 'bg-green-200' : ($recruitment->failed_stage === 'Test Project' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage2 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Test Project' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                            <i class="fa-solid fa-laptop-code"></i>
                        </span>
                        <h3 class="text-base font-semibold mt-3 items-center leading-tight">Test Project</h3>
                        @if ($recruitment->stage1 && !$recruitment->stage2 && !$recruitment->failed_stage)
                            <form action="{{ route('admin.recruitment.updateStage', [$recruitment->uuid, 'stage2']) }}"
                                method="POST">
                                @csrf
                                <button name="action" value="yes"
                                    class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Iya</button>
                                <button name="action" value="no"
                                    class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Tidak</button>
                            </form>
                        @endif
                    </li>

                    <li
                        class="flex flex-col mb-10 ms-10 {{ $recruitment->stage3 ? 'text-green-600' : ($recruitment->failed_stage === 'Interview' ? 'text-red-600' : 'text-gray-500') }}">
                        <span
                            class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage3 ? 'bg-green-200' : ($recruitment->failed_stage === 'Interview' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage3 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Interview' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                            <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <h3 class="text-base font-semibold mt-3 items-center leading-tight">Interview</h3>
                        @if ($recruitment->stage2 && !$recruitment->stage3 && !$recruitment->failed_stage)
                            <form action="{{ route('admin.recruitment.updateStage', [$recruitment->uuid, 'stage3']) }}"
                                method="POST">
                                @csrf
                                <button name="action" value="yes"
                                    class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Iya</button>
                                <button name="action" value="no"
                                    class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Tidak</button>
                            </form>
                        @endif
                    </li>

                    <li
                        class="flex flex-col ms-10 {{ $recruitment->stage4 ? 'text-green-600' : ($recruitment->failed_stage === 'Offering' ? 'text-red-600' : 'text-gray-500') }}">
                        <span
                            class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage4 ? 'bg-green-200' : ($recruitment->failed_stage === 'Offering' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage4 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Offering' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </span>
                        <h3 class="text-base font-semibold mt-3 items-center leading-tight">Offering</h3>
                        @if ($recruitment->stage3 && !$recruitment->stage4 && !$recruitment->failed_stage)
                            <form action="{{ route('admin.recruitment.updateStage', [$recruitment->uuid, 'stage4']) }}"
                                method="POST">
                                @csrf
                                <button name="action" value="yes"
                                    class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Iya</button>
                                <button name="action" value="no"
                                    class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Tidak</button>
                            </form>
                        @endif
                    </li>
                </ol>

                </div>
            </div>
            <script>
                document.getElementById('editButton').addEventListener('click', function() {
                    const buttons = document.querySelectorAll('form button');
                    buttons.forEach(button => {
                        button.classList.toggle('hidden');
                    });
                });
            </script>
        </div>
    </div>
@endsection