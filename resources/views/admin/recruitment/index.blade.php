@extends('admin.layouts.main')

@section('container')
<div class="relative mt-3">
    <div class="px-4 pt-6">

        @include('admin.partials.breadcrumb')

        @include('admin.partials.toast')

        <div class="bg-white shadow-lg p-3 my-6 border rounded">
            <div class="flex justify-between items-center mt-2 pb-4 mx-6">
                <h1 class="text-xl font-bold">Rekrutmen</h1>

                <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                    class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded text-sm px-2.5 py-1 text-center"
                    type="button">
                    <i class="fa-solid fa-file-export"></i>Excel
                </button>


            </div>
            <hr>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs uppercase border-b">
                        <tr>
                            <th width="5%" scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Telepon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pendidikan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Posisi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harapan Gaji
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CV
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recruitments as $recruitment)
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 ">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $recruitment->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->nik }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->phone_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->study }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->position }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->salary }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recruitment->file_path }}
                                </td>
                                
                                <td class="px-6 py-4 flex">
                                    <button data-modal-target="edit_modal_{{ $recruitment->id }}"
                                        data-modal-toggle="edit_modal_{{ $recruitment->id }}"
                                        class="text-blue-700 border border-blue-700 hover:text-white hover:bg-blue-700 font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                        type="button">
                                        <i class="fa-solid fa-eye"></i>
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
@endsection
{{-- <footer class="absolute bottom-0 left-0 right-0 bg-gray-100 dark:bg-gray-900">
        <p class="py-4 text-sm text-center text-gray-500">
            © 2019-2023 <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite.com</a>. All rights reserved.
        </p>
    </footer> --}}
