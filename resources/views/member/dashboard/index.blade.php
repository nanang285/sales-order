@if (session('warning'))
    <script>
        alert('{{ session('warning') }}');
    </script>
@endif

@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.toast')
            <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-6 my-6">
                <div class="flex justify-between mb-6">
                    <div>
                        <h3 class="text-blue-700 text-lg font-semibold">
                            <i class="fa-solid fa-caret-right"></i>
                            &nbsp;Data Rekrutmen Masuk
                        </h3>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
