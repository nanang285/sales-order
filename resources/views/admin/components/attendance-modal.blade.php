{{-- Tambah Data --}}
<div id="add_modal" tabindex="2" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow p-5">
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
            <div class="">
                <form class="space-y-4" action="{{ route('admin.attendance.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="relative">
                        <label for="time_in" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                <div class="fa-solid fa-clock text-base"></div>
                            </div>
                            <input type="time" id="time_in" name="time_in"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <div class="relative">
                        <label for="time_in_max" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk
                            Maksimal:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                <div class="fa-solid fa-clock text-base"></div>
                            </div>
                            <input type="time" id="time_in_max" name="time_in_max"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <div class="relative">
                        <label for="time_out_min" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar
                            Minimal:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                <div class="fa-solid fa-clock text-base"></div>
                            </div>
                            <input type="time" id="time_out_min" name="time_out_min"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <div class="relative">
                        <label for="time_out" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar:</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                <div class="fa-solid fa-clock text-base"></div>
                            </div>
                            <input type="time" id="time_out" name="time_out"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                        Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Data --}}
@foreach ($attendances as $attendance)
    <div id="edit_modal_{{ $attendance->id ?? '' }}" tabindex="2" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow p-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit_modal_{{ $attendance->id ?? '' }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="">
                    <form class="space-y-4" action="{{ route('admin.attendance.update', $attendance->id ?? '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="relative">
                            <label for="time_in" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_in" name="time_in"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_in ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_in_max" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk Maksimal:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_in_max" name="time_in_max"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_in_max ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_out_min" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar Minimal:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_out_min" name="time_out_min"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_out_min ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_out" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_out" name="time_out"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_out ?? '' }}" required />
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
@endforeach

{{-- Hapus Data --}}
@foreach ($attendances as $attendance)
    <div id="delete_modal_{{ $attendance->id }}" tabindex="2" aria-hidden="true"
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
                        data-modal-hide="delete_modal_{{ $attendance->id }}">
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
                    <form class="space-y-4" action="{{ route('admin.attendance.destroy', $attendance->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')

                        <div class="relative">
                            <label for="time_in" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_in" name="time_in"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_in ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_in_max" class="block mb-2 text-sm font-medium text-gray-900">Jam Masuk Maksimal:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_in_max" name="time_in_max"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_in_max ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_out_min" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar Minimal:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_out_min" name="time_out_min"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_out_min ?? '' }}" required />
                            </div>
                        </div>

                        <div class="relative">
                            <label for="time_out" class="block mb-2 text-sm font-medium text-gray-900">Jam Keluar:</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none text-gray-700">
                                    <div class="fa-solid fa-clock text-base"></div>
                                </div>
                                <input type="time" id="time_out" name="time_out"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $attendance->time_out ?? '' }}" required />
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus
                            Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
