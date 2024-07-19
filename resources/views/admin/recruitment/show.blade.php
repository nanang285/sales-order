@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">

            @include('admin.partials.breadcrumb')

            @include('admin.partials.toast')

            {{-- <form method="POST" action="{{ route('hero.update', $recruitment->id) }}" enctype="multipart/form-data"> --}}
            @csrf
            @method('PUT')

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
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->nik }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Alamat :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->address }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">No.Telp/HP/WA :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->phone_number }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Pendidikan :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->study }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Posisi Yang Dilamar :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->position }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="block mb-1 text-base font-medium text-gray-900">Gaji Yang Diharapkan :</label>
                        <div class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full p-2">
                            <p>{{ $recruitment->salary }}</p>
                        </div>
                    </div>

                </div>

                <div class="p-5 rounded col-span-10 lg:col-span-6 flex flex-col">
                    <div class="">
                        <h3 class="text-gray-700 font-semibold">Tahapan</h3>
                    </div>
                    <ol class="relative mx-8 mt-5 text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            </span>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-base leading-tight">Check CV</h3>
                                    <p class="text-sm">Selamat Anda Lolos ke Tahap Test Project</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button type="button" class="ring-1 ring-green-500 text-green-500 hover:text-white hover:bg-green-500 font-semibold text-sm py-0.5 px-1.5 rounded transition duration-300">
                                        Ya
                                    </button>
                                    <button type="button" class="ring-1 ring-red-500 text-red-500 hover:text-white hover:bg-red-500 font-semibold text-sm py-0.5 px-1.5 rounded transition duration-300">
                                        Tidak
                                    </button>
                                </div>
                            </div>
                            
                        </li>
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                                </svg>
                            </span>
                            <h3 class="font-semibold text-base leading-tight">Test Project</h3>
                            <p class="text-sm">Selamat Anda Lolos ke Tahap Interview</p>
                        </li>
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                </svg>
                            </span>
                            <h3 class="font-semibold text-base leading-tight">Interview</h3>
                            <p class="text-sm">Selamat Anda Lolos Interview</p>
                        </li>
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                </svg>
                            </span>
                            <h3 class="font-semibold text-base leading-tight">Offering</h3>
                            <p class="text-sm">Anda Mendapatkan Tawaran dari Perusahaan</p>
                        </li>
                        <li class="ms-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                </svg>
                            </span>
                            <h3 class="font-semibold text-base leading-tight">Selesai</h3>
                            <p class="text-sm">Selamat Anda Di terima di perusahaan ini</p>
                        </li>
                    </ol>
                </div>
                
             </div>
            </form>
        </div>
    </div>
@endsection
{{-- <footer class="absolute bottom-0 left-0 right-0 bg-gray-100 dark:bg-gray-900">
        <p class="py-4 text-sm text-center text-gray-500">
            © 2019-2023 <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights reserved.
        </p>
    </footer> --}}
