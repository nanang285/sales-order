{{-- Tambah Data --}}
<div id="add_modal" tabindex="2" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow p-5">
            <!-- Modal header -->
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Data
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add_modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="">
                <form class="space-y-4" action="{{ route('promo.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="images"
                            class="block mb-2 text-sm font-medium text-gray-900">Images</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="images"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <span class="w-8 h-8">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span></p>
                                </div>
                                <input id="images" type="file" name="image_path" class="hidden" accept="image/*" />
                            </label>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                        Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Data --}}

    <div id="edit_modal_{{ $promoSection->id }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow p-4">
                <!-- Modal header -->
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit_modal_{{ $promoSection->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="">
                    <form class="space-y-4" action="{{ route('client.update', $promoSection->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="image_{{ $promoSection->id }}" class="block mb-2 text-sm font-medium text-gray-900">Images</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="image_{{ $promoSection->id }}"
                                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <span class="w-8 h-8">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                        </span>
                                        <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                    </div>
                                    <input id="image_{{ $promoSection->id }}" type="file" name="image_path" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- Hapus Data --}}
    <div id="delete_modal_{{ $promoSection->id }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white p-4 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="delete_modal_{{ $promoSection->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="">
                    <p class="text-sm text-red-500 ">Apakah Anda yakin ingin menghapus data ini?</p>
                    <form class="mt-4" action="{{ route('client.destroy', $promoSection->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900">Images</label>
                            <div class="flex items-center justify-center w-full">
                                <label for=""
                                    class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <img src="{{ asset('storage/uploads/client-section/' . ($Promo->image_path ?? '')) }}"
                                    alt="Zen Multimedia Indonesia" class="w-14">
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
