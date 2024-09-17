@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')

            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-52">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-lg font-semibold"><i class="fa-solid fa-caret-right"></i>&nbsp;
                                Data Karyawan</h3>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-2 w-full md:w-auto">
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
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                            </div>
                            <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                                class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded-md text-sm px-2.5 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
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
                                            $startNumber = ($employees->currentPage() - 1) * $employees->perPage() + 1;
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
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-gray-800">
                                                    <button data-modal-target="edit_modal_{{ $employee->id }}"
                                                        data-modal-toggle="edit_modal_{{ $employee->id }}"
                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded text-sm 
                                                        px-2.5 py-1.5 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button data-modal-target="delete_modal_{{ $employee->id }}"
                                                        data-modal-toggle="delete_modal_{{ $employee->id }}"
                                                        class="text-red-700 border border-red-700 hover:bg-red-800 hover:text-white font-medium rounded text-sm 
                                                        px-2.5 py-1.5 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.employe-modal')
@endsection
