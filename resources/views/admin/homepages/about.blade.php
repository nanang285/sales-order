@include('admin.partials.toast')
@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.home-bread')
            <div class="bg-white my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-full">
                        <div class="flex items-center mb-6">
                            <h3 class="text-blue-700 text-xl font-bold">
                                <i class="fa-solid fa-caret-right"></i>
                                &nbsp;Profil
                            </h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <form method="POST"
                    action="{{ route($aboutSection ? 'admin.homepages.about.update' : 'admin.homepages.about.store', $aboutSection->id ?? '') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($aboutSection)
                        @method('PUT')
                    @else
                        @method('POST')
                    @endif
                    <div class="grid grid-cols-10 gap-3 lg:gap-4">
                        <div class="mt-1 border-lg rounded col-span-10 lg:col-span-4 flex flex-col items-center">
                            <div class="relative">
                                @if (!empty($aboutSection->video_path))
                                    <video class="w-full max-w-full mx-auto rounded-xl object-cover" controls
                                        controlsList="nodownload">
                                        <source
                                            src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <p>Video belum tersedia.</p>
                                @endif

                            </div>
                        </div>

                        <div class="bg-white shadow-lg p-6 border rounded-xl col-span-10 lg:col-span-6">
                            <div class="mb-4">
                                <label for="subtitle" class="block mb-1 text-sm font-medium text-gray-900">Tentang
                                    Kami</label>
                                <textarea name="subtitle" id="subtitle_{{ $aboutSection->id ?? 'new' }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
                                    block w-full h-20 max-h-24 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan Informasi" required>{{ old('subtitle', $aboutSection->subtitle ?? '') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="video_path" class="block mb-1 text-sm font-medium text-gray-900">Upload
                                    Video</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                    aria-describedby="file_input_help" name="video_path" id="file_input" type="file"
                                    accept="video/mp4, video/avi, video/mov, video/wmv, video/webm">
                                <p class="mt-1 text-sm text-red-600 dark:text-gray-300" id="file_input_help">
                                    Video (MAX. 20MB).
                                </p>
                            </div>

                            <button type="submit" id="updateButton"
                                class="mt-4 ring-1 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                                {{ $aboutSection ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
