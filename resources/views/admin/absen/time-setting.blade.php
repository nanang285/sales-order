@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-5">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
            <div class="bg-white shadow-sm my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-xl mb-4">
                        <div class="flex items-center">
                            <h3 class="text-blue-700 text-lg font-semibold flex items-center">
                                <i class="fa-solid fa-caret-right mr-2"></i>
                                Pengaturan Waktu Absen
                            </h3>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                            class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded text-sm px-2.5 py-1 text-center"
                            type="button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
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
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Masuk
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Masuk Maksimal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Keluar Minimal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Jam Keluar
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 border text-start text-xs font-semibold text-blue-700 uppercase">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($attendances as $attendance)
                                            <tr class="">
                                                <td
                                                    class="px-6 py-3 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $attendance->time_in ?? '' }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $attendance->time_in_max ?? '' }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $attendance->time_out_min ?? '' }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    {{ $attendance->time_out ?? '' }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 border whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <button data-modal-target="edit_modal_{{ $attendance->id ?? '' }}"
                                                        data-modal-toggle="edit_modal_{{ $attendance->id ?? '' }}"
                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded-md text-sm px-2.5 py-1.5 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button data-modal-target="delete_modal_{{ $attendance->id }}"
                                                        data-modal-toggle="delete_modal_{{ $attendance->id }}"
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
        @include('admin.components.attendance-modal')
    </div>
@endsection
