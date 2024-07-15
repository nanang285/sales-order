@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
            <form method="POST" action="{{ route('hero.update', $heroSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                    <div class="bg-white shadow-lg p-5 lg:my-6 border-lg rounded col-span-10 lg:col-span-4 flex flex-col items-center">
                        <div class="relative mb-3">
                            <img src="{{ asset('storage/uploads/hero-section/' . $heroSection->image_path) }}"
                                alt="{{ $heroSection->image_path }}"
                                class="w-full rounded max-w-[300px] max-h-[200px] object-cover">
                        </div>
                        <div id="preview" class="mt-4"></div>
                        <div class="flex items-center justify-center w-full">
                            <label for="images"
                                class="flex flex-col items-center justify-center w-full h-20 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <span class="w-8 h-8">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload</span>
                                    </p>
                                </div>
                                <input id="images" type="file" name="image_path" class="hidden" accept="image/*" />
                            </label>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-5 lg:my-6 border rounded col-span-10 lg:col-span-6">
                        <div class="mb-5">
                            <h3 class="text-gray-700 font-semibold">Beranda</h3>
                        </div>
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" name="title" id="title"
                                class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                placeholder="Masukan judul" required value="{{ $heroSection->title }}" />
                        </div>
                        <div>
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">Informasi</label>
                            <textarea name="subtitle" id="subtitle_{{ $heroSection->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                block w-full h-16 max-h-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                placeholder="Masukan informasi" required>{{ $heroSection->subtitle }}</textarea>
                        </div>
                        
                        <button type="submit" id="updateButton"
                        class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                            Update
                        </button>

                        
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
