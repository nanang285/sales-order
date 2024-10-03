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
                            <h3 class="text-blue-700 text-lg font-semibold">
                                Data Rekrutmen
                            </h3>
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
                            <a href="{{ route('admin.recruitment.export') }}"
                                class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded-md text-sm px-2.5 py-1 text-center"
                                type="button">
                                <i class="fa-solid fa-file-export"></i><span class="">Export</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col">
                    <div class="overflow-hidden">
                        <div class="py-4 px-1">
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
                                                Data Masuk
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
                                                Posisi Dilamar
                                            </span>
                                        </th>
                                        <th data-type="date">
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Harapan Gaji
                                            </span>
                                        </th>
                                        <th>
                                            <span class="flex items-center text-sm font-bold text-blue-800">
                                                Tahapan
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
                                    @foreach ($recruitments as $index => $recruitment)
                                        <tr>
                                            <td class="text-sm font-semibold text-gray-600">{{ $loop->iteration }}</td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ \Carbon\Carbon::parse($recruitment->created_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $recruitment->name }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $recruitment->email }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $recruitment->phone_number }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                {{ $recruitment->position }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">Rp
                                                {{ number_format($recruitment->salary, 0, ',', '.') }}</td>
                                            <td class="text-sm font-semibold text-gray-600
                                                @php
                                                    $textColor = 'text-gray-500';
                                                    $animation = '';
                                                    $status = 'Belum Dimulai';

                                                    // Cek jika semua stage benar dan tidak ada yang gagal
                                                    if ($recruitment->failed_stage) {
                                                        $textColor = 'text-red-600';
                                                        $status = $recruitment->failed_stage;
                                                    } elseif (
                                                        $recruitment->stage4 &&
                                                        $recruitment->stage3 &&
                                                        $recruitment->stage2 &&
                                                        $recruitment->stage1
                                                    ) {
                                                        $textColor = 'text-green-600';
                                                        $status = 'Diterima';
                                                    } elseif ($recruitment->stage4) {
                                                        $textColor = 'text-blue-600';
                                                        $status = 'Offering';
                                                    } elseif ($recruitment->stage3) {
                                                        $textColor = 'text-blue-600';
                                                        $status = 'Interview';
                                                    } elseif ($recruitment->stage2) {
                                                        $textColor = 'text-blue-600';
                                                        $status = 'Test Project';
                                                    } elseif ($recruitment->stage1) {
                                                        $textColor = 'text-blue-600';
                                                        $status = 'Check CV';
                                                    } else {
                                                        $animation = 'animate-pulse';
                                                    }
                                                @endphp
                                                {{ $textColor }} {{ $animation }}">
                                                {{ $status }}
                                            </td>
                                            <td class="text-sm font-semibold text-gray-600">
                                                <a href="{{ asset('storage/uploads/recruitment/' . $recruitment->file_path) }}"
                                                    target="_blank"
                                                    class="text-yellow-300 border-2 border-yellow-300 hover:text-white hover:bg-yellow-300 font-medium rounded-md text-sm inline-flex items-center justify-center w-8 h-8 m-1">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.recruitment.edit', $recruitment->uuid) }}"
                                                    class="text-blue-500 border-2 border-blue-500 hover:text-white hover:bg-blue-500 font-medium rounded-md text-sm inline-flex items-center justify-center w-8 h-8 m-1"
                                                    type="button">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </a>
                                                <button data-modal-target="delete_modal_{{ $recruitment->uuid }}"
                                                    data-modal-toggle="delete_modal_{{ $recruitment->uuid }}"
                                                    class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white font-medium rounded-md text-sm px-2 py-1 m-1 text-center"
                                                    type="button">
                                                    <i class="fa-solid fa-trash"></i>
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
    @include('admin.recruitment.modal')
@endsection
