@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.home-bread')
            @include('admin.partials.toast')
            <div class="bg-white p-3 my-6 border rounded-xl">
                <div class="flex justify-between items-center mt-2 pb-4 mx-6">
                    <h1 class="text-lg text-blue-600 font-bold"><i class="fa-solid fa-caret-right"></i> Portofolio </h1>

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
                                <th scope="col" class="px-6 py-3">
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Informasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    link
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestProject as $project)
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-4 ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ asset('storage/uploads/latest-project/' . $project->image_path) }}"
                                            data-lightbox="project" data-title="{{ $project->title }}">
                                            <img src="{{ asset('storage/uploads/latest-project/' . ($project->image_path ?? '')) }}"
                                                alt="{{ $project->image_path }}" class="w-20 rounded">
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        {{ $project->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ Str::limit($project->subtitle, 100) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->button_link }}
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <button data-modal-target="edit_modal_{{ $project->id }}"
                                            data-modal-toggle="edit_modal_{{ $project->id }}"
                                            class="text-blue-700 border border-blue-700 hover:text-white hover:bg-blue-700 font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
                                            type="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button data-modal-target="delete_modal_{{ $project->id }}"
                                            data-modal-toggle="delete_modal_{{ $project->id }}"
                                            class="text-red-700 border border-red-700 hover:text-white hover:bg-red-700 font-medium rounded text-sm px-2.5 py-1.5 m-1 text-center"
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
    @include('admin.components.project-modal')
@endsection
