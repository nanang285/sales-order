@foreach ($recruitments as $recruitment)
    <div id="delete_modal_{{ $recruitment->uuid }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white p-4 rounded shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="delete_modal_{{ $recruitment->uuid }}">
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
                    <form class="mt-4" action="{{ route('recruitment.destroy', $recruitment->uuid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    
                        <div class="mb-3">
                            <label for="title_{{ $recruitment->uuid }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="title" id="title_{{ $recruitment->uuid }}"
                                value="{{ $recruitment->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="title_{{ $recruitment->uuid }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" name="title" id="title_{{ $recruitment->uuid }}"
                                value="{{ $recruitment->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                readonly />
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