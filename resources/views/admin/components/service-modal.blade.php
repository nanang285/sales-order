{{-- Add Data --}}
<div id="add_modal" tabindex="2" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded shadow p-5">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Data
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add_modal">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <div class="">
                <form class="space-y-4" action="{{ route('admin.homepages.service.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                        <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                            placeholder="Masukan judul" required />
                    </div>
                    <div>
                        <label for="subtitle_{{ $service->id ?? '' }}"
                            class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea name="subtitle" id="subtitle_{{ $service->id ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full h-24 max-h-28 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                            placeholder="Masukan Deskripsi" required maxlength="250"></textarea>
                    </div>
                    <div>
                        <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="images"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <span class="w-8 h-8">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span></p>
                                </div>
                                <input id="images" type="file" name="image_path" class="hidden" required />
                            </label>
                        </div>
                        <label class="block mt-2 text-center text-sm font-medium text-red-600">Gambar (MAX 4MB)</label>
                    </div>
                    <button type="submit"
                        class="w-full text-green-700 hover:text-white border border-green-700 hover:bg-green-700 focus:outline-none font-medium rounded text-sm px-5 py-2.5 text-center">Tambah
                        Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Data --}}
@foreach ($serviceSection as $service)
    <div id="edit_modal_{{ $service->id ?? '' }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded shadow p-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit_modal_{{ $service->id }}">
                        <i class="fa-solid fa-x"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="">
                    <form class="space-y-4" action="{{ route('admin.homepages.service.update', $service->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="title_{{ $service->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" name="title" id="title_{{ $service->id }}"
                                value="{{ $service->title }}" placeholder="Masukan Judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                required />
                        </div>
                        <div>
                            <label for="subtitle_{{ $service->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Informasi</label>
                            <textarea name="subtitle" id="subtitle_{{ $service->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full h-24 max-h-28 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                required placeholder="Masukan Informasi" maxlength="250">{{ $service->subtitle }}</textarea>
                        </div>
                        <div>
                            <label for="image_{{ $service->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="image_{{ $service->id }}"
                                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <span class="w-8 h-8">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                        </span>
                                        <p class="text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span></p>
                                    </div>
                                    <input id="image_{{ $service->id }}" type="file" name="image_path"
                                        class="hidden" />
                                </label>
                            </div>
                        <label class="block mt-2 text-center text-sm font-medium text-red-600">Gambar (MAX 4MB)</label>

                        </div>
                        <button type="submit"
                            class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-700 focus:outline-none font-medium rounded text-sm px-5 py-2.5 text-center">Edit
                            Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Delete Data --}}
@foreach ($serviceSection as $service)
    <div id="delete_modal_{{ $service->id }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <div class="relative bg-white p-4 rounded shadow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="delete_modal_{{ $service->id }}">
                        <i class="fa-solid fa-x"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="">
                    <p class="text-sm text-red-500 ">Apakah Anda yakin ingin menghapus data ini?</p>
                    <form class="mt-4" action="{{ route('admin.homepages.service.destroy', $service->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="title_{{ $service->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" name="title" id="title_{{ $service->id }}"
                                value="{{ $service->title }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="subtitle_{{ $service->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Informasi</label>
                            <textarea name="subtitle" id="subtitle_{{ $service->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full h-24 max-h-28 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly>{{ $service->subtitle }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <div class="flex items-center justify-center w-full">
                                <label for=""
                                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <img src="{{ asset('storage/uploads/service-section/' . ($service->image_path ?? '')) }}"
                                        alt="{{ $service->image_path }}" class="w-14">
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-700 focus:outline-none font-medium rounded text-sm px-5 py-2.5 text-center">
                            Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
