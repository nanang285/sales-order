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
                            <h3 class="text-blue-700 text-lg font-semibold">
                                Data Karyawan
                            </h3>
                        </div>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-2 w-full md:w-auto">
                            <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                                class="transition duration-300 block font-medium rounded-md text-sm px-2.5 py-1 text-center text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500"
                                type="button">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="min-w-full">
                        <div class=" overflow-hidden py-4 px-1">
                            <table id="pagination-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                No
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Nama Lengkap
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jam Masuk
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jam Masuk Maksimal
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jam Keluar Minimal
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jam Keluar
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                ID Fingerprint
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Aksi
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $index => $employee)
                                    <tr>
                                        <td class="text-sm font-semibold text-gray-600">{{ $loop->iteration }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->name }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->jam_masuk }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->jam_masuk_maksimal }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->jam_keluar_minimal }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->jam_keluar }}</td>
                                        <td class="text-sm font-semibold text-gray-600">{{ $employee->fingerprint_id }}</td>
                                        <td class="text-sm font-semibold text-gray-600">
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
    @include('admin.components.employe-modal')
@endsection
