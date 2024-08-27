@extends('layouts.main')
@section('container')
<div class="relative">
    <div id="about" class="bg-fixed bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('images/20190801143905-GettyImages-1128215665.jpeg') }}')">
        <div class="relative max-h-screen py-24 lg:py-52 bg-gray-900 bg-opacity-90">
            <div class="mx-auto max-w-4xl">
                <div class="flex justify-center">
                    <div class="mx-4 relative rounded-full px-3 mt-4 py-1 text-sm leading-6 text-gray-600">
                        <div class="flex" id="shadow"></div>
                        <h1 class="text-4xl lg:text-5xl text-center font-normal tracking-tight text-white sm:text-6xl">
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, ipsam?
                        </h1>
                        <p class="mt-6 text-base lg:text-xl leading-8 text-center text-gray-200">
                           Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum nihil, soluta beatae iste fugit mollitia repellat dolores tenetur officiis culpa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection