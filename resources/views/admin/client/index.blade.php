@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">

            @include('admin.partials.breadcrumb')

            @include('admin.partials.toast')

            <div class="bg-white shadow-lg p-3 my-6 border rounded">
                <div class="flex justify-between items-center mt-2 pb-4 mx-6">
                    <h1 class="text-xl font-bold">Galeri</h1>
                    <button data-modal-target="add_modal" data-modal-toggle="add_modal"
                        class="transition duration-300 block text-green-500 border-2 border-green-500 hover:text-white hover:bg-green-500 font-medium rounded text-sm px-2.5 py-1 text-center"
                        type="button">
                        <i class="fa-solid fa-plus"></i>
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
                                <th width="15%" scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3 text-right">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientSection as $client)
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ asset('storage/uploads/client-section/' . $client->image_path) }}"
                                            data-lightbox="client" data-title="{{ $client->title }}">
                                            <img src="{{ asset('storage/uploads/client-section/' . ($client->image_path ?? '')) }}"
                                                alt="{{ $client->image_path }}" class="w-16 rounded-md">
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button data-modal-target="edit_modal_{{ $client->id }}"
                                            data-modal-toggle="edit_modal_{{ $client->id }}"
                                            class="text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded text-sm 
                                        px-2.5 py-1.5 m-1 text-center"
                                            type="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button data-modal-target="delete_modal_{{ $client->id }}"
                                            data-modal-toggle="delete_modal_{{ $client->id }}"
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
    @include('admin.client.modal')
@endsection
