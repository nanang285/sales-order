@include('admin.partials.toast')
@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.home-bread')
            <div class="bg-white shadow my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-full">
                        <div class="flex items-center mb-6">
                            <h3 class="text-blue-700 text-lg font-semibold">
                                <i class="fa-solid fa-caret-right"></i>
                                &nbsp;Profil
                            </h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                    <div class="rounded-md col-span-10 lg:col-span-4 flex flex-col">
                        <div class="relative">
                            <video class="w-full rounded-lg max-w-xl h-48 border object-cover" controls controlsList="nodownload">
                                <source src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                                    type="video/webm">
                            </video>
                        </div>
                        <div class="">
                            <input
                                class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                aria-describedby="file_input_help" name="video_path" id="file_input" type="file"
                                accept="video/mp4, video/avi, video/mov, video/wmv, video/webm">
                        </div>
                    </div>
                    <div class="bg-white border rounded-lg col-span-10 lg:col-span-6">

                        <div class="grid grid-cols-10 gap-2 lg:gap-3">
                            <div class="p-4 rounded col-span-10 lg:col-span-10 flex flex-col relative">
                                <div class="w-full max-w-full mb-3">
                                    <div class="mb-2 flex justify-between items-center">    
                                        <h3 class="text-blue-700 text-lg font-semibold">
                                            <i class="fa-solid fa-caret-right"></i>
                                            Edit
                                        </h3>

                                        <button id="editButton" data-tooltip-target="tooltip-default" type="button"
                                            class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="subtitle" class="block mb-1 text-sm font-medium text-gray-900">
                                        Tentang Kami</label>
                                    <textarea name="subtitle" id="subtitle_{{ $aboutSection->id }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                        block w-full h-24 max-h-28 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                        placeholder="Masukan Informasi" required>{{ $aboutSection->subtitle }}</textarea>
                                </div>
                                <button type="submit" id="updateButton"
                                    class="mt-4 ring-1 max-w-20 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1 px-2 rounded transition duration-300">
                                    Update
                                </button>
                                
                            </div>

                            <script>
                                $('#editButton').on('click', function() {
                                    
                                    $('#file_input').toggleClass('hidden');
                                    $('#updateButton').toggleClass('hidden');
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <form method="POST" action="{{ route('admin.homepages.about.update', $aboutSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                    <div
                        class="bg-white shadow-lg p-5 mt-1 lg:my-6 border-lg  rounded col-span-10 lg:col-span-4 flex flex-col items-center">
                        <div class="relative mb-3">
                            <video class="w-full max-w-md mx-auto rounded" controls controlsList="nodownload">
                                <source src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                                    type="video/webm">
                            </video>
                        </div>
                        <div id="preview" class=""></div>
                    </div>
                    <div class="bg-white shadow-lg p-4 lg:my-6 border rounded col-span-10 lg:col-span-6">
                        <div class="mb-2">
                            <label for="subtitle" class="block mb-1 text-sm font-medium text-gray-900">
                                Tentang Kami</label>
                            <textarea name="subtitle" id="subtitle_{{ $aboutSection->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                block w-full h-20 max-h-24 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                placeholder="Masukan Informasi" required>{{ $aboutSection->subtitle }}</textarea>
                        </div>
                        <div class="">
                            <label for="subtitle" class="block mb-1 text-sm font-medium text-gray-900">Upload
                                Video</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                aria-describedby="file_input_help" name="video_path" id="file_input" type="file"
                                accept="video/mp4, video/avi, video/mov, video/wmv, video/webm">
                        </div>
                        <button type="submit" id="updateButton"
                            class="mt-4 ring-1 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1 px-2 rounded transition duration-300">
                            Update
                        </button>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
@endsection