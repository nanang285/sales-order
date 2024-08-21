@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.home-bread')
            @include('admin.partials.toast')
            <div class="bg-white shadow-lg my-6 border rounded-lg p-8">
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
                            <a href="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}" data-lightbox="promo" data-title="{{ $promoSection->title }}">
                                <img src="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}"
                                    alt="{{ $promoSection->image_path }}"
                                    class="w-full rounded max-w-xl max-h-auto object-cover">
                            </a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg border rounded col-span-10 lg:col-span-6">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <form method="POST" action="{{ route('promo.update', $promoSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-10 gap-3 lg:gap-4">
                    <div class="bg-white shadow-lg p-5 lg:my-6 border-lg rounded col-span-10 lg:col-span-4 flex flex-col items-center relative">
                        <div class="absolute z-20 top-0 right-0 mt-2 mr-2">
                            <label for="edit-upload"
                                class="bg-white text-gray-800 hover:bg-blue-700 hover:text-white rounded-full p-2 shadow-md border cursor-pointer flex justify-center items-center transition duration-300">
                                <i class="fa-solid fa-pen text-sm"></i>
                                <input id="edit-upload" type="file" name="image_path" class="hidden" accept="image/*"
                                    onchange="handleFileUpload(event)">
                            </label>
                        </div>
                        <div class="relative">
                            <a href="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}" data-lightbox="promo" data-title="{{ $promoSection->title }}">
                                <img src="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}"
                                    alt="{{ $promoSection->image_path }}"
                                    class="w-full rounded max-w-[380px] max-h-[200px] object-cover">
                            </a>
                        </div>
                        <div class="flex space-x-2">
                            <button type="submit" id="updateButton"
                                class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form> --}}
