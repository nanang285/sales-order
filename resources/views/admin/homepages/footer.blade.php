@extends('admin.layouts.main')

@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
            <form method="POST"
                action="{{ $footerSection ? route('admin.homepages.footer.update', $footerSection->id) : route('admin.homepages.footer.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if ($footerSection)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-10 gap-4">
                    <div class="bg-white shadow-lg p-5 my-6 border rounded col-span-10">
                        <div class="mb-5">
                            <h3 class="text-gray-700 font-semibold">Pengaturan Footer</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="my-3">
                                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                                <input type="number" name="no_telp" id="no_telp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="628**********" required
                                    value="{{ old('no_telp', $footerSection->no_telp ?? '') }}" />
                            </div>

                            <div class="my-3">
                                <label for="sosmed_1" class="block mb-2 text-sm font-medium text-gray-900">Facebook</label>
                                <input type="text" name="sosmed_1" id="sosmed_1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_1" required
                                    value="{{ old('sosmed_1', $footerSection->sosmed_1 ?? '') }}" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="my-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan email" required
                                    value="{{ old('email', $footerSection->email ?? '') }}" />
                            </div>

                            <div class="my-3">
                                <label for="sosmed_2" class="block mb-2 text-sm font-medium text-gray-900">Instagram</label>
                                <input type="text" name="sosmed_2" id="sosmed_2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_2" required
                                    value="{{ old('sosmed_2', $footerSection->sosmed_2 ?? '') }}" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="my-3">
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <textarea name="alamat" id="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full h-16 max-h-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan alamat" required>{{ old('alamat', $footerSection->alamat ?? '') }}</textarea>
                            </div>

                            <div class="my-3">
                                <label for="sosmed_3" class="block mb-2 text-sm font-medium text-gray-900">Youtube</label>
                                <input type="text" name="sosmed_3" id="sosmed_3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_3" required
                                    value="{{ old('sosmed_3', $footerSection->sosmed_3 ?? '') }}" />
                            </div>
                        </div>

                        <button type="submit" id="updateButton"
                            class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                            {{ $footerSection ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    {{-- @include('admin.hero.modal') --}}
@endsection
