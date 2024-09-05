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
                                        class="w-full rounded-lg max-w-xl h-auto max-h-72 border object-cover">
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

                                        <div class="flex space-x-2">
                                            <button id="editButton" data-tooltip-target="tooltip-default" type="button"
                                                class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            @if ($promoSection)
                                                <button id="deleteButton" type="button"
                                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>


                                        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50"></div>

                                        <div id="confirmationPopup"
                                            class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                            <div class="bg-white rounded-lg shadow-lg p-6">
                                                <form id="deleteForm"
                                                    action="{{ route('admin.homepages.promo.destroy', $promoSection->id ?? '') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p class="text-gray-700">Are you sure you want to delete this item?</p>
                                                    <div class="flex justify-end mt-4">
                                                        <button type="submit" id="confirmDelete"
                                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                                                        <button type="button" id="cancelDelete"
                                                            class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form method="POST"
                                    action="{{ route($promoSection ? 'admin.homepages.promo.update' : 'admin.homepages.promo.store', $promoSection->id ?? '') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($promoSection)
                                        @method('PUT')
                                    @else
                                        @method('POST')
                                    @endif

                                    <label class="block mb-2 text-base font-semibold text-gray-900 dark:text-white"
                                        for="file_input">
                                        Upload :
                                    </label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:cursor-not-allowed"
                                        aria-describedby="file_input_help" id="file_input" type="file" name="image_path">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                        (MAX. 4MB).
                                    </p>

                                    <button type="submit" id="updateButton"
                                        class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                                        {{ $promoSection ? 'Update' : 'Create' }}
                                    </button>
                                </form>


                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#file_input').prop('disabled', true);

                                    $('#updateButton').addClass('hidden');

                                    $('#editButton').on('click', function() {
                                        $('#file_input').prop('disabled', function(i, val) {
                                            return !val;
                                        });

                                        $('#updateButton').toggleClass('hidden');
                                    });
                                });

                                $(document).ready(function() {
                                    const $overlay = $('#overlay');
                                    const $confirmationPopup = $('#confirmationPopup');
                                    const $deleteButton = $('#deleteButton');
                                    const $confirmDelete = $('#confirmDelete');
                                    const $cancelDelete = $('#cancelDelete');
                                    const $body = $('body');

                                    function openConfirmationPopup() {
                                        $overlay.removeClass('hidden');
                                        $confirmationPopup.removeClass('hidden');
                                        $body.css('overflow', 'hidden'); 
                                    }

                                    function closeConfirmationPopup() {
                                        $overlay.addClass('hidden');
                                        $confirmationPopup.addClass('hidden');
                                        $body.css('overflow', '');
                                    }

                                    $deleteButton.on('click', openConfirmationPopup);
                                    $cancelDelete.on('click', closeConfirmationPopup);
                                    $overlay.on('click', closeConfirmationPopup);

                                    $confirmDelete.on('click', function() {
                                        $('#deleteForm').submit(); 
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
