@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">

            @include('admin.partials.breadcrumb')

            @include('admin.partials.toast')

            <form method="POST" action="{{ route('about.update', $aboutSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-10 gap-3 lg:gap-4">

                    <div class="bg-white shadow-lg p-5 mt-1 lg:my-6 border-lg  rounded col-span-10 lg:col-span-4 flex flex-col items-center">

                        <div class="relative mb-3">
                            <video class="w-full max-w-md mx-auto rounded" controls
                            controlsList="nodownload">
                            <source src="{{ asset('storage/uploads/about-section/' . $aboutSection->video_path) }}"
                                type="video/webm">
                        </video>
                        </div>
                        <div id="preview" class=""></div>
                        <div class="flex items-center justify-center w-full">
                            <label for="video"
                                class="flex flex-col items-center justify-center w-full h-20 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <span class="w-8 h-8">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload</span>
                                    </p>
                                </div>
                                <input id="video" type="file" name="video_path" class="hidden" accept="viceo/*" />
                            </label>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-5 lg:my-6 border rounded col-span-10 lg:col-span-6">
                        <div class="mb-5">
                            <h3 class="text-gray-700 font-semibold">Profil</h3>
                        </div>
                        <div>
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">Tentang Kami</label>
                            <textarea name="subtitle" id="subtitle_{{ $aboutSection->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 
                                block w-full h-28 max-h-32 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                placeholder="Masukan Informasi" required>{{ $aboutSection->subtitle }}</textarea>
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

    {{-- <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview');
            previewContainer.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.className = 'w-full h-auto rounded';
                    previewContainer.appendChild(imgElement);
                }
                reader.readAsDataURL(file);
            }
        });
    </script> --}}
    
@endsection
