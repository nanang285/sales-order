<header class="py-1 fixed z-[30] w-full bg-[#DADEFF] shadow-sm">
    <div class="px-3 py-2 lg:py-4 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between lg:justify-start w-full">
                {{-- <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-3 text-gray-600 rounded cursor-pointer lg:hidden">
                    <i class="fa-solid fa-bars"></i>
                </button> --}}

                <div class="flex-grow flex justify-center lg:justify-start lg:hidden">
                    <a href="{{ Route('dashboard') }}"
                        class="flex items-center justify-center lg:justify-start text-base">
                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" class="h-12 lg:h-12"
                            alt="ZenMultimediaIndonesia" />
                    </a>
                </div>

                <p class="lg:flex lg:ml-64">
                    <span id="welcome-message"
                        class="hidden lg:inline text-gray-500 font-semibold text-sm lg:text-base ml-2"></span>
                </p>
            </div>
            <div class="flex flex-row space-x-4 relative">
                <div>
                    <button type="button"
                        class="flex text-sm bg-white rounded-full focus:ring-4 p-1 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-6 h-6 rounded-full" src="{{ asset('dist/images/logo/zmi-logo-3.webp') }}"
                            alt="Bonnie avatar">
                    </button>
                </div>

                <div class="z-50 hidden my-4 text-base flex list-none absolute border bg-white divide-y divide-gray-100 rounded shadow w-64 transform translate-x-12"
                    id="dropdown-2">
                    <div class="px-4 py-3" role="none">
                        <h1 class="text-lg font-semibold mb-2">Akun ZMI</h1>
                        <div class="flex items-center mb-5">
                            <img src="{{ asset('dist/images/logo/zmi-logo-3.webp') }}" alt="User Avatar"
                                class="w-8 h-8 rounded-full mr-4">
                            <div class="">
                                <p class="text-sm mb-0 font-normal text-gray-900" role="none">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-sm font-semibold text-gray-900 truncate" role="none">
                                   Role : {{ Auth::user()->role }}
                                </p>
                            </div>
                        </div>
                        <button data-modal-target="logout_modal" data-modal-toggle="logout_modal"
                            class="flex items-center transition duration-300 text-red-500 border border-red-500 hover:text-white hover:bg-red-500 font-medium rounded text-sm px-1 py-0.5 text-center"
                            type="button">
                            <i class="fa-solid fa-right-from-bracket lg:mr-1"></i>
                            <span class="hidden lg:flex">Logout</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<button data-modal-target="logout_modal" data-modal-toggle="logout_modal"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Toggle modal
</button>

<div id="logout_modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="logout_modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda Yakin Ingin Keluar
                    Dari Halaman Ini?</h3>
                <div class="flex justify-center space-x-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button data-modal-hide="logout_modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, Saya Yakin
                        </button>
                    </form>
                    <button data-modal-hide="logout_modal" type="button"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Tidak, Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
