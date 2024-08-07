@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">

            @include('admin.partials.breadcrumb')

            @include('admin.partials.toast')

            <div class="mt-4">
                <h3 class="text-gray-700 font-semibold">Data Rekrutmen</h3>
            </div>
            <div class="bg-white shadow-lg grid grid-cols-10 gap-3 lg:gap-4 my-4">

                <div class="p-5 rounded col-span-10 lg:col-span-4">

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Nama Lengkap :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->name }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Email :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->email }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">NIK :</label>
                        <input placeholder="-" value="{{ $recruitment->nik }}" disabled
                            class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                        </input>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Alamat :</label>
                        <div
                            class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full max-h-20 p-2">
                            <p>{{ $recruitment->address }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">No.Telp/HP/WA :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->phone_number }}</p>
                        </div>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Pendidikan :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->study }}</p>
                        </div>
                    </div>

                   <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Posisi Yang Dilamar
                            :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->position }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Gaji Yang Diharapkan
                            :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->salary }}</p>
                        </div>
                    </div> --}}

                </div>

                <div class="p-5 rounded col-span-10 lg:col-span-6 flex flex-col">
                    <div class="mb-2 flex justify-between items-center">
                        <h3 class="text-gray-700 text-base font-semibold">Tahapan :</h3>
                        <button id="editButton" class="bg-yellow-500 text-white text-sm px-2.5 py-0.5 rounded">Edit</button>
                    </div>

                    {{-- @if (session('error'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif --}}
                    <!-- Button Edit -->
                    

                    <ol class="relative text-gray-500 border-s-2 left-5 border-gray-200 dark:border-gray-700 dark:text-gray-400">
                        <!-- Stage 1 -->
                        <li class="flex flex-col mb-10 ms-10 {{ $recruitment->stage1 ? 'text-green-600' : ($recruitment->failed_stage === 'Check CV' ? 'text-red-600' : 'text-gray-500') }}">
                            <span class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage1 ? 'bg-green-200' : ($recruitment->failed_stage === 'Check CV' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage1 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Check CV' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                                <i class="fa-regular fa-file-pdf"></i>
                            </span>
                            <h3 class="text-base font-semibold mt-3 items-center leading-tight">Cek CV</h3>
                            @if (!$recruitment->stage1 && !$recruitment->failed_stage)
                                <form action="{{ route('recruitment.updateStage', [$recruitment->uuid, 'stage1']) }}" method="POST">
                                    @csrf
                                    <button name="action" value="yes" class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Terima</button>
                                    <button name="action" value="no" class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Tolak</button>
                                </form>
                            @endif
                        </li>
                    
                        <!-- Stage 2 -->
                        <li class="flex flex-col mb-10 ms-10 {{ $recruitment->stage2 ? 'text-green-600' : ($recruitment->failed_stage === 'Test Project' ? 'text-red-600' : 'text-gray-500') }}">
                            <span class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage2 ? 'bg-green-200' : ($recruitment->failed_stage === 'Test Project' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage2 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Test Project' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                                <i class="fa-solid fa-laptop-code"></i>
                            </span>
                            <h3 class="text-base font-semibold mt-3 items-center leading-tight">Test Project</h3>
                            @if ($recruitment->stage1 && !$recruitment->stage2 && !$recruitment->failed_stage)
                                <form action="{{ route('recruitment.updateStage', [$recruitment->uuid, 'stage2']) }}" method="POST">
                                    @csrf
                                    <button name="action" value="yes" class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Yes</button>
                                    <button name="action" value="no" class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">No</button>
                                </form>
                            @endif
                        </li>
                    
                        <!-- Stage 3 -->
                        <li class="flex flex-col mb-10 ms-10 {{ $recruitment->stage3 ? 'text-green-600' : ($recruitment->failed_stage === 'Interview' ? 'text-red-600' : 'text-gray-500') }}">
                            <span class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage3 ? 'bg-green-200' : ($recruitment->failed_stage === 'Interview' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage3 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Interview' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                                <i class="fa-solid fa-user-tie"></i>
                            </span>
                            <h3 class="text-base font-semibold mt-3 items-center leading-tight">Interview</h3>
                            @if ($recruitment->stage2 && !$recruitment->stage3 && !$recruitment->failed_stage)
                                <form action="{{ route('recruitment.updateStage', [$recruitment->uuid, 'stage3']) }}" method="POST">
                                    @csrf
                                    <button name="action" value="yes" class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Yes</button>
                                    <button name="action" value="no" class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">No</button>
                                </form>
                            @endif
                        </li>
                    
                        <!-- Stage 4 -->
                        <li class="flex flex-col ms-10 {{ $recruitment->stage4 ? 'text-green-600' : ($recruitment->failed_stage === 'Offering' ? 'text-red-600' : 'text-gray-500') }}">
                            <span class="absolute flex items-center justify-center w-10 h-10 {{ $recruitment->stage4 ? 'bg-green-200' : ($recruitment->failed_stage === 'Offering' ? 'bg-red-200' : 'bg-gray-100') }} rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 {{ $recruitment->stage4 ? 'dark:bg-green-900' : ($recruitment->failed_stage === 'Offering' ? 'dark:bg-red-900' : 'dark:bg-gray-700') }}">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </span>
                            <h3 class="text-base font-semibold mt-3 items-center leading-tight">Offering</h3>
                            @if ($recruitment->stage3 && !$recruitment->stage4 && !$recruitment->failed_stage)
                                <form action="{{ route('recruitment.updateStage', [$recruitment->uuid, 'stage4']) }}" method="POST">
                                    @csrf
                                    <button name="action" value="yes" class="bg-blue-500 text-white text-sm px-2.5 py-0.5 rounded hidden">Yes</button>
                                    <button name="action" value="no" class="bg-red-500 text-white text-sm px-2.5 py-0.5 rounded hidden">No</button>
                                </form>
                            @endif
                        </li>
                    </ol>
                    
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
            </form>
        </div>
    </div>
@endsection
