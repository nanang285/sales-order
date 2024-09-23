@include('admin.partials.toast')
@extends('admin.layouts.main')

@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            <div class="bg-white my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-full">
                        <div class="flex items-center mb-6 justify-between">
                            <h3 class="text-blue-700 text-xl font-bold">
                                <i class="fa-solid fa-caret-right"></i>
                                &nbsp;Tentang Kami
                            </h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <form method="POST"
                    action="{{ route($aboutUs ? 'admin.about-us.update' : 'admin.about-us.store', $aboutUs->id ?? '') }}"
                    enctype="multipart/form-data" id="aboutUsForm">
                    @csrf
                    @if ($aboutUs)
                        @method('PUT')
                    @else
                        @method('POST')
                    @endif

                    <div class="grid grid-cols-10 gap-3 lg:gap-4">
                        <div class="bg-white p-6 border rounded-xl col-span-10 lg:col-span-4">
                            <div class="container mx-auto">
                                <div class="mb-6">
                                    <label for="description"
                                        class="block text-gray-700 text-lg font-semibold mb-2">Deskripsi:</label>
                                    <h2 class="text-lg font-normal text-justify mb-4">{{ $aboutUs->description ?? '' }}</h2>

                                    <label for="services" class="block text-gray-700 text-lg font-semibold mb-2">Layanan
                                        Unggulan:</label>
                                    @if ($aboutUs->list_items ?? '')
                                        <ul class="list-disc list-inside text-lg">
                                            @foreach (json_decode($aboutUs->list_items) as $item)
                                                <li class="text-gray-600">{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-500">Tidak ada item yang tersedia.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 border rounded-xl col-span-10 lg:col-span-6">
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-gray-700 text-lg font-semibold mb-2">Deskripsi</label>
                                <textarea name="description" id="description" rows="4"
                                    class="border border-gray-300 rounded-md h-28 max-h-32 p-2 w-full focus:ring-2 focus:ring-blue-400"
                                    required>{{ $aboutUs->description ?? '' }}</textarea>
                            </div>
                            <div id="list-items" class="mb-4 relative">
                                <div class="mb-6">
                                    <label for="services"
                                        class="block text-gray-700 text-lg font-semibold mb-2">Layanan</label>
                                    <button type="button"
                                        class="absolute top-0 right-0 bg-blue-500 text-white px-3 py-2.5 rounded-md hover:bg-blue-600"
                                        onclick="addListItem()"><i class="fa-solid fa-plus"></i></button>
                                </div>

                                @if (isset($aboutUs) && $aboutUs->list_items)
                                    @foreach (json_decode($aboutUs->list_items) as $item)
                                        <div class="flex items-center mb-2">
                                            <input type="text" name="list_items[]"
                                                class="border border-gray-300 rounded-md p-2 mr-2 w-full focus:ring-2 focus:ring-blue-400"
                                                placeholder="Masukkan item" value="{{ $item }}" required>
                                            <button type="button"
                                                class="bg-red-500 text-white px-3 py-2.5 rounded-md text-lg hover:bg-red-600"
                                                onclick="removeListItem(this)"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex items-center mb-2">
                                        <input type="text" name="list_items[]"
                                            class="border border-gray-300 rounded-md p-2 mr-2 w-full focus:ring-2 focus:ring-blue-400"
                                            placeholder="Masukkan item" required>
                                        <button type="button"
                                            class="bg-red-500 text-white px-3 py-2.5 rounded-md text-lg hover:bg-red-600"
                                            onclick="removeListItem(this)"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4">
                                <button type="submit" id="updateButton"
                                    class="bg-blue-500 text-white px-3 py-1.5 rounded-md hover:bg-blue-600">
                                    {{ isset($aboutUs) ? 'Update' : 'Simpan' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addListItem() {
            const newItemDiv = `
                <div class="flex items-center mb-2">
                    <input type="text" name="list_items[]" class="border border-gray-300 rounded-md p-2 mr-2 w-full focus:ring-2 focus:ring-blue-400" placeholder="Masukkan item" required>
                    <button type="button" class="bg-red-500 text-white px-3 py-2.5 rounded-md text-lg hover:bg-red-600" onclick="removeListItem(this)"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            `;
            $('#list-items').append(newItemDiv);
        }

        function removeListItem(button) {
            $(button).parent().remove();
        }

        function toggleForm() {
            const $form = $('#aboutUsForm');
            const $inputs = $form.find('input, textarea');

            $inputs.prop('disabled', false);
        }
    </script>

@endsection
