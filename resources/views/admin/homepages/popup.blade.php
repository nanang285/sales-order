@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.home-bread')
            @include('admin.partials.toast')
            <div class="bg-white shadow my-6 border rounded-lg p-6">
                <div class="flex flex-col md:flex-row mb-6 items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                    <div class="w-full max-w-full">
                        <div class="flex items-center mb-6">
                            <h3 class="text-blue-700 text-lg font-semibold">
                                <i class="fa-solid fa-caret-right"></i>
                                &nbsp;PopUp
                            </h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                    <div class="rounded col-span-10 lg:col-span-4 flex flex-col">
                        <div class="relative">
                            @if ($promoSection && $promoSection->image_path)
                                <a href="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}"
                                   data-lightbox="promo" data-title="{{ $promoSection->title ?? '' }}">
                                    <img src="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}"
                                         alt="{{ $promoSection->title ?? 'Promo Image' }}"
                                         class="w-full rounded-lg max-w-xl h-auto max-h-64 border object-cover">
                                </a>
                            @else
                                <a href="{{ asset('path/to/default/image.jpg') }}"
                                   data-lightbox="promo" data-title="Default Image">
                                    <img src="{{ asset('path/to/default/image.jpg') }}"
                                         alt="Default Image"
                                         class="w-full rounded-lg max-w-xl h-auto max-h-64 border object-cover">
                                </a>
                            @endif
                        </div>
                        
                    </div>
                    <div class="bg-white border rounded-lg col-span-10 lg:col-span-6">

                        <div class="grid grid-cols-10 gap-2 lg:gap-3">
                            <div class="p-4 rounded col-span-10 lg:col-span-10 flex flex-col relative">
                                <div class="w-full max-w-full mb-3">
                                    <div class="mb-2 flex justify-between items-center">
                                        <h3 class="text-blue-700 text-lg font-semibold">
                                            <i class="fa-solid fa-caret-right"></i>
                                            Edit
                                        </h3>

                                        <button id="editButton" data-tooltip-target="tooltip-default" type="button"
                                            class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </div>

                                <form method="POST" action="{{ route($promoSection ? 'admin.homepages.promo.update' : 'admin.homepages.promo.store', $promoSection->id ?? '') }}" enctype="multipart/form-data">
                                    @csrf
                                    @if ($promoSection)
                                        @method('PUT')
                                    @else
                                        @method('POST')
                                    @endif
                                
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                                        Upload file
                                    </label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:cursor-not-allowed"
                                        aria-describedby="file_input_help" id="file_input" type="file" name="image_path">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                        PNG, JPG, WEBP, GIF (MAX. 800x400px).
                                    </p>
                                
                                    <button type="submit" id="updateButton"
                                        class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                                        {{ $promoSection ? 'Update' : 'Create' }}
                                    </button>
                                </form>
                                
                                
                            </div>

                            <script>
                                $('#editButton').on('click', function() {
                                    
                                    $('#file_input').prop('disabled', function(i, val) {
                                        return !val;
                                    });
                                    
                                    $('#updateButton').toggleClass('hidden');
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
