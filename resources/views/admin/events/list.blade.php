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
                            <h3 class="text-blue-700 text-2lg font-bold">
                                List Acara
                            </h3>
                        </div>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-2 w-full relative">
                            <!-- Button with Tooltip -->
                            <a href="{{route('admin.events.add')}}" data-modal-target="add_modal" data-modal-toggle="add_modal" data-tooltip-target="tooltip-default"
                                class="transition duration-300 block font-medium rounded-md text-sm px-2.5 py-1 text-center text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 relative"
                                type="button">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                    
                            <!-- Tooltip -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-green-500 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Tambah
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
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
                                                Gambar 
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Judul 
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Type
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Harga
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Jumlah Quota
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                               Kategori
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
                                    
                                    <tr>
                                        <td class="text-sm font-semibold text-gray-600">1</td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            <img src="{{asset('dist/images/event-zmi-2.png')}}" class="w-32">
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            Zen Multimedia Expo 2024
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            <span class="bg-blue-500 rounded p-2 text-white">Gratis</span>
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">Rp 0,00 </td>
                                        <td class="text-sm font-semibold text-gray-600">100</td>
                                        <td class="text-sm font-semibold text-gray-600">DevOps</td>
                                        <td class="text-sm font-semibold text-gray-600 flex items-center space-x-2">
                                            <!-- Edit Button with Tooltip -->
                                            <div class="relative group">
                                                <button data-modal-target="edit_modal_" data-modal-toggle="edit_modal_"
                                                    class="text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                                    type="button">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                        
                                                <!-- Tooltip for Edit -->
                                                <div class="absolute z-10 bottom-full mb-2 px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    Edit
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        
                                            <!-- Delete Button with Tooltip -->
                                            <div class="relative group">
                                                <button data-modal-target="delete_modal_" data-modal-toggle="delete_modal_"
                                                    class="text-red-700 border border-red-700 hover:bg-red-800 hover:text-white font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                                    type="button">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                        
                                                <!-- Tooltip for Delete -->
                                                <div class="absolute z-10 bottom-full mb-2 px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    Hapus
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
