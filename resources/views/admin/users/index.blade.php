@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div class="bg-white shadow-lg px-3 my-6 border rounded">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 px-4 py-6">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h1 class="text-gray-800 font-bold text-xl">
                                Rekrutmen
                            </h1>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <a href="{{ Route('recruitment.add') }}"
                                class="transition duration-300 block text-blue-500 border-2 border-blue-500 hover:text-white hover:bg-blue-500 font-medium rounded text-sm px-2.5 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                                class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded text-sm px-2.5 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-file-export"></i><span class="">Export</span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 my-4 md:space-x-4 px-4">
                    <div class="w-full max-w-52 mb-4">
                        <form action="{{ route('admin.recruitment') }}" method="GET" class="flex items-center max-w-md mx-auto">
                            @csrf
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" name="search" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md  block w-full p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Cari" required />
                            </div>
                            <button type="submit"
                                class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded border border-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>

                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-700 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700"
                                type="button">
                                <i class="fa-solid fa-filter"></i>
                                <span class="mx-2">Filter</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                            <div id="filterDropdown"
                                class="border-gray-400 border z-10 hidden w-40 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Filter Data</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="newest" name="filter" type="radio" value="newest"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="newest"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Terbaru
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="oldest" name="filter" type="radio" value="oldest"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="oldest"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Terlama
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex mx-4 flex-col">
                    <div class="overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class=" overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-1 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Data Masuk
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Nama Lengkap
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                No.Telp
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Posisi dilamar
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Harapan Gaji
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Gagal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @php
                                            $startNumber =
                                                ($recruitments->currentPage() - 1) * $recruitments->perPage() + 1;
                                        @endphp
                                        @foreach ($recruitments as $index => $recruitment)
                                            <tr>
                                                <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    @if ($filter == 'oldest')
                                                        {{ $recruitments->total() - $recruitments->firstItem() - $index + 1 }}
                                                    @else
                                                        {{ $recruitments->firstItem() + $index }}
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ \Carbon\Carbon::parse($recruitment->created_at)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $recruitment->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $recruitment->email }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $recruitment->phone_number }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $recruitment->position }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    Rp {{ number_format($recruitment->salary, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-600">
                                                    {{ $recruitment->failed_stage }}
                                                </td>
                                                <td class="whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="{{ route('recruitment.edit', $recruitment->uuid) }}"
                                                        class="text-yellow-300 border-2 border-yellow-300 hover:text-white hover:bg-yellow-300 font-medium rounded text-sm inline-flex items-center justify-center w-8 h-8 m-1"
                                                        type="button">
                                                        <i class="fa-solid fa-user-pen"></i>
                                                    </a>
                                                    <button data-modal-target="delete_modal_{{ $recruitment->uuid }}"
                                                        data-modal-toggle="delete_modal_{{ $recruitment->uuid }}"
                                                        class="text-red-700 border border-red-700 hover:bg-red-800 hover:text-white font-medium rounded text-sm 
                                                        px-2.5 py-1.5 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                    <button data-modal-target="pdfModal"
                                                        data-file-path="{{ asset('storage/uploads/recruitment/' . $recruitment->file_path) }}"
                                                        class="text-blue-500 border-2 border-blue-500 hover:text-white hover:bg-blue-500 font-medium rounded text-sm inline-flex items-center justify-center w-8 h-8 m-1"
                                                        type="button">
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div id="pdfModal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full max-h-full">
                                            <div class="relative p-4 w-full max-w-4xl max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <div class="absolute flex items-center justify-between p-4 -right-6 -top-6">
                                                        <button type="button"
                                                            class="text-gray-400 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-7 h-7 inline-flex justify-center items-center"
                                                            data-modal-hide="pdfModal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <div class="p-2">
                                                        <iframe id="pdfFrame" src="" width="100%" height="500px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col overflow-x-auto md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Menampilkan
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $recruitments->firstItem() }}-{{ $recruitments->lastItem() }}</span>
                        Dari
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $recruitments->total() }}</span>
                    </span>
                    {{ $recruitments->links('vendor.pagination') }}
                </div>

            </div>
        </div>
    </div>
    @include('admin.recruitment.modal')



    <script>
        document.querySelectorAll('input[name="filter"]').forEach((filter) => {
            filter.addEventListener('change', function() {
                const selectedFilter = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('filter', selectedFilter);
                window.location.href = url.toString();
            });
        });
    </script>

    <script>
        document.querySelectorAll('[data-modal-target]').forEach(button => {
            button.addEventListener('click', function() {
                const filePath = this.getAttribute('data-file-path');
                const modal = document.getElementById(this.getAttribute('data-modal-target'));
                const iframe = modal.querySelector('#pdfFrame');

                iframe.src = filePath;
                modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById(this.getAttribute('data-modal-hide'));
                modal.classList.add('hidden');
            });
        });
    </script>
@endsection
