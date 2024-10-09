<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden p-6 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[999] justify-center w-full md:inset-0 max-h-full">
    <div class="relative w-full max-w-5xl max-h-full">
        <div class="relative rounded-lg">
            <div class="absolute items-center justify-between -top-2 -right-2 dark:border-gray-600">
                <button type="button"
                    class="text-gray-400 bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="flex flex-col md:flex-row p-4 md:p-6 space-y-4 md:space-y-0 mt-20 md:mt-0 bg-white rounded-xl">
                <div class="md:w-1/2 px-2 relative flex flex-col h-full">
                    <div class="mb-6">
                        <h1 class="text-lg font-bold text-center">Pendaftaran</h1>
                    </div>
                
                    <div class="flex-grow">
                        <form class="max-w-md mx-auto" method="POST" action="{{ $event->type == 'berbayar' ? route('payment-event.store') : route('payment-event.freepayment') }}"> 
                            @csrf
                            <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="nama_lengkap"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Nama Lengkap
                                    </label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="email" name="email" id="email"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="email"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Email
                                    </label>
                                </div>
                            </div>
                
                            <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="no_telp" id="no_telp"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="no_telp"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        No Telp
                                    </label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="jabatan" id="jabatan"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="jabatan"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Jabatan/Posisi
                                    </label>
                                </div>
                            </div>
                
                            <div class="grid md:grid-cols-2 md:gap-6 mb-3">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="nama_perusahaan"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Nama Perusahaan
                                    </label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="alamat" id="alamat"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="alamat"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Alamat
                                    </label>
                                </div>
                            </div>
                
                            <input type="hidden" name="harga" value="{{ $event->harga }}">
                            <input type="hidden" name="jenis_produk" value="{{ $event->judul }}">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="image_path" value="{{ $event->image_path }}">
                            <input type="hidden" name="waktu" value="{{ $event->waktu }}">
                            <input type="hidden" name="type" value="{{ $event->type }}">
                
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-center text-sm w-full md:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Daftar
                            </button>
                        </form>
                    </div>
                
                    <p class="text-gray-600 text-sm font-normal text-left mt-4 bottom-0 flex items-center justify-center w-full">
                        Powered by
                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" class="w-16 ml-2 no-select" alt="ZMI Logo">
                    </p>
                </div>

                <div class="md:w-1/2  flex-col bg-gray-200 rounded-lg hidden md:flex">
                    <img src="{{ asset('storage/uploads/event/' . ($event->image_path ?? 'default-image.jpg')) }}"
                        alt="Deskripsi Gambar" class="mb-2 rounded-lg max-w-full h-auto f">

                    <h2 class="text-gray-600 text-base font-bold text-left mx-3 mb-2">Pesanan :</h2>
                    <p class="text-gray-600 text-sm font-normal text-left mx-3 mb-4">
                        {{ now()->translatedFormat('l, d F Y • H:i') }}
                    </p>

                    <div class="flex justify-between items-center mx-3 mb-5">
                        <p class="text-gray-600 text-sm font-normal">1 x {{ $event->judul }}</p>
                        <p class="text-gray-600 text-sm font-normal">Rp
                            {{ number_format($event->harga, 2, ',', '.') }}</p>
                    </div>

                    <div class="flex justify-between items-center mx-3 mb-3">
                        <h1 class="text-gray-600 text-base font-bold">Total</h1>
                        <p class="text-gray-600 text-base font-bold">Rp
                            {{ number_format($event->harga, 2, ',', '.') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
