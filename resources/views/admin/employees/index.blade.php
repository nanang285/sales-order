@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;
                                Data Absen</h3>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-2 w-full md:w-auto">
                            <a href="{{ Route('admin.recruitment.add') }}"
                                class="transition duration-300 block text-blue-500 border-2 border-blue-500 hover:text-white hover:bg-blue-500 font-medium rounded-md text-sm px-2 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-user-plus"></i>
                            </a>
                            <button onclick="exportTableToExcel('dataTable', 'RekrutmenData')"
                                class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded-md text-sm px-2.5 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-file-export"></i><span class="">Export</span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 mt-6">
                    <div class="w-full max-w-52">
                        <form action="{{ route('admin.employees.index') }}" method="GET"
                            class="flex items-center max-w-md mx-auto">
                            @csrf
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" name="search" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md  block w-full p-1.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Cari" required />
                            </div>
                            <button type="submit"
                                class="p-2 ms-2 text-sm font-medium text-white bg-blue-700 rounded-md border border-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                        class="w-full md:w-auto flex flex-col md:flex-row md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-1.5 px-4 text-sm font-medium text-gray-700 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700"
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
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class=" overflow-hidden">
                                <table id="dataTable" class="min-w-full mt-3 divide-y divide-gray-200">
                                    <thead>
                                        <tr class="">
                                            <th scope="col"
                                                class="px-1 py-3 text-start text-xs font-semibold text-blue-700 uppercase">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase">
                                                Nama Lengkap
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase">
                                                Divisi
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase">
                                                Role
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-semibold text-blue-700 uppercase">
                                                ID Fingerprint
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-semibold text-blue-700 uppercase">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @php
                                            $startNumber =
                                                ($employees->currentPage() - 1) * $employees->perPage() + 1;
                                        @endphp
                                        @foreach ($employees as $index => $employee)
                                            <tr class="">
                                                <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    @if ($filter == 'oldest')
                                                        {{ $employees->total() - $employees->firstItem() - $index + 1 }}
                                                    @else
                                                        {{ $employees->firstItem() + $index }}
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $employee->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $employee->division }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $employee->role }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $employee->fingerprint_id }}
                                                </td>
                                                <td class="whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                                        class="text-blue-500 border-2 border-blue-500 hover:text-white hover:bg-blue-500 font-medium rounded-md text-sm inline-flex items-center justify-center w-8 h-8 m-1"
                                                        type="button">
                                                        <i class="fa-solid fa-user-pen"></i>
                                                    </a>
                                                    <button data-modal-target="delete_modal_{{ $employee->id }}"
                                                        data-modal-toggle="delete_modal_{{ $employee->id }}"
                                                        class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white font-medium rounded-md text-sm 
                                                        px-2 py-1 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function exportTableToExcel(tableID, filename = '') {
                                        // Get current date and time for filename
                                        const now = new Date();
                                        const formattedDate = now.toISOString().split('T')[0]; // YYYY-MM-DD
                                        const formattedTime = now.toTimeString().split(' ')[0].replace(/:/g, '-'); // HH-MM-SS
                                        filename = filename ? `${filename}_${formattedDate}_${formattedTime}.xlsx` :
                                            `excel_data_${formattedDate}_${formattedTime}.xlsx`;

                                        // Get table element
                                        const tableSelect = document.getElementById(tableID);

                                        // Remove "Aksi" column
                                        const tableClone = tableSelect.cloneNode(true);
                                        const headers = tableClone.querySelectorAll('thead th');
                                        const columnIndexToRemove = Array.from(headers).findIndex(header => header.textContent.trim() === 'Aksi');

                                        if (columnIndexToRemove !== -1) {
                                            const rows = tableClone.querySelectorAll('tr');
                                            rows.forEach(row => {
                                                const cells = row.querySelectorAll('th, td');
                                                cells[columnIndexToRemove].remove();
                                            });
                                        }

                                        // Convert table to sheet and create workbook
                                        const dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
                                        const tableHTML = tableClone.outerHTML.replace(/ /g, '%20');
                                        const downloadLink = document.createElement("a");
                                        const worksheet = XLSX.utils.table_to_sheet(tableClone);
                                        const workbook = XLSX.utils.book_new();
                                        XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

                                        // Save workbook
                                        XLSX.writeFile(workbook, filename);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col overflow-x-auto md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Menampilkan
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $employees->firstItem() }}-{{ $employees->lastItem() }}</span>
                        Dari
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $employees->total() }}</span>
                        Data.
                    </span>
                    {{ $employees->links('vendor.pagination') }}
                </div>

            </div>
        </div>
    </div>
    {{-- @include('admin.recruitment.modal') --}}

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
