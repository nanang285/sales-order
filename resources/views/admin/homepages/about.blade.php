@include('admin.partials.toast')
@extends('admin.layouts.main')
@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">
            @include('admin.partials.home-bread')
            <form method="POST" action="{{ route('about.update', $aboutSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
            </form>
        </div>
    </div>
@endsection