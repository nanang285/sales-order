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
                                List Pembelian
                            </h3>
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
                                               Jenis Produk 
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Nama Lengkap 
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Email 
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                No Telp
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                               Jumlah Transaksi
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                               Keterangan
                                            </span>
                                        </th>
                                        {{-- <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Aksi
                                            </span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody> 
                                    
                                    @foreach ( $paymentEvent as $payment )
                                    <tr>
                                        <td class="text-sm font-semibold text-gray-600">1</td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            {{$payment->jenis_produk}}
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            {{$payment->nama_lengkap}}
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            {{$payment->email}}
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            {{$payment->no_telp}}
                                        </td>
                                        <td class="text-sm font-semibold text-gray-600">
                                            Rp {{ number_format($payment->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-base font-bold">
                                            <span class="bg-blue-500 rounded p-2 text-white">
                                            {{$payment->keterangan ?? '-'}}
                                            </span>
                                        </td>
                                        {{-- <td class="text-sm font-semibold text-gray-600 flex items-center space-x-2">
                                            <!-- Edit Button with Tooltip -->
                                            <div class="relative group">
                                                <button data-modal-target="edit_modal_" data-modal-toggle="edit_modal_"
                                                    class="text-yellow-300 border border-yellow-300 hover:bg-yellow-300 hover:text-white font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                                    type="button">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                        
                                                <!-- Tooltip for Edit -->
                                                <div class="absolute z-10 bottom-full mb-2 px-3 py-2 text-sm font-medium text-white bg-yellow-300 rounded-lg shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    Lihat
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </td> --}}
                                        
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
@endsection
