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
                                Daftar Transaksi
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
                                                Produk Dipilih
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Nama Customer
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
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Aksi
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($paymentEvent as $index => $payment)
                                        <tr>
                                            <td class="text-sm font-semibold text-gray-600">{{ $index + 1 }}</td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $payment->jenis_produk }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $payment->nama_lengkap }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $payment->email }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $payment->no_telp }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                Rp {{ number_format($payment->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="text-base font-bold">
                                                <span class="bg-blue-500 rounded p-2 text-white">
                                                    {{ $payment->keterangan ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600 flex items-center space-x-2">
                                                <div class="relative group">
                                                    <button data-modal-target="delete_modal_{{ $payment->id }}" data-modal-toggle="delete_modal_{{ $payment->id }}"
                                                        class="text-red-500 border border-red-500 hover:bg-red-500 hover:text-white font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                                        type="button">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($paymentEvent as $payment)
                <div id="delete_modal_{{ $payment->id }}" tabindex="2" aria-hidden="true"
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
                                    data-modal-hide="delete_modal_{{ $payment->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="">
                                <p class="text-sm text-red-500 ">Apakah Anda yakin ingin menghapus data ini?</p>
                                <form class="mt-4" action="{{ route('admin.payments.destroy', $payment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="mb-3">
                                        <label for="produk{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Produk Dipilih</label>
                                        <input type="text" name="title" id="produk{{ $payment->id }}"
                                            value="{{ $payment->jenis_produk }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Nama Customer</label>
                                        <input type="text" name="title" id="judul{{ $payment->nama_lengkap }}"
                                            value="{{ $payment->nama_lengkap }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="text" name="title" id="email{{ $payment->email }}"
                                            value="{{ $payment->email }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">No. Telp</label>
                                        <input type="text" name="title" id="email{{ $payment->email }}"
                                            value="{{ $payment->no_telp }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Jumlah Transaksi</label>
                                        <input type="text" name="title" id="email{{ $payment->email }}"
                                            value="{{ $payment->harga }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email{{ $payment->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                        <input type="text" name="title" id="email{{ $payment->email }}"
                                            value="{{ $payment->keterangan }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                            readonly />
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus
                                        Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
