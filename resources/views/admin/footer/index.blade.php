@extends('admin.layouts.main')

@section('container')
    <div class="relative mt-3">
        <div class="px-4 pt-6">

            @include('admin.partials.breadcrumb')

            @include('admin.partials.toast')

            <form method="POST" action="{{ route('footer.update', $footerSection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-10 gap-4">
                    <div class="bg-white shadow-lg p-5 my-6 border rounded col-span-10">
                        <div class="mb-5">
                            <h3 class="text-gray-700 font-semibold">Pengaturan Footer</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            
                            <div class="my-3">
                                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                                <input type="number" name="no_telp" id="no_telp"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="628**********" required value="{{ $footerSection->no_telp }}" />
                            </div>

                            <div class="my-3">
                                <label for="sosmed_1" class="block mb-2 text-sm font-medium text-gray-900">Facebook</label>
                                <input type="text" name="sosmed_1" id="sosmed_1"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_1" required value="{{ $footerSection->sosmed_1 }}" />
                            </div>

                        </div>

                        <div class="grid grid-cols-2 gap-4">

                            <div class="my-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan email" required value="{{ $footerSection->email }}" />
                            </div>

                            <div class="my-3">
                                <label for="sosmed_2" class="block mb-2 text-sm font-medium text-gray-900">Instagram</label>
                                <input type="text" name="sosmed_2" id="sosmed_2"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                    block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_2" required value="{{ $footerSection->sosmed_2 }}" />
                            </div>

                        </div>

                        <div class="grid grid-cols-2 gap-4"> 

                             <div class="my-3">
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <textarea name="alamat" id="alamat_{{ $footerSection->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                block w-full h-16 max-h-20 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan alamat" required>{{ $footerSection->alamat }}</textarea>
                            </div>

                            <div class="my-3">
                                <label for="sosmed_3" class="block mb-2 text-sm font-medium text-gray-900">Youtube</label>
                                <input type="text" name="sosmed_3" id="sosmed_3"
                                    class="bottom-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 
                                block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400"
                                    placeholder="Masukan sosmed_3" required value="{{ $footerSection->sosmed_3 }}" />
                            </div>

                        </div>

                        <button type="submit" id="updateButton"
                        class="mt-4 ring-2 font-semibold ring-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 text-sm py-1.5 px-2.5 rounded transition duration-300">
                            Update
                        </button>
                    </div>
                </div>


            </form>


        </div>
    </div>
    {{-- @include('admin.hero.modal') --}}

    {{-- <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview');
            previewContainer.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.className = 'w-full h-auto rounded';
                    previewContainer.appendChild(imgElement);
                }
                reader.readAsDataURL(file);
            }
        });
    </script> --}}
@endsection
