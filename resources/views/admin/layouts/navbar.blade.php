<header class="py-1 fixed z-[30] w-full bg-white lg:bg-gray-100">
    <div class="px-3 py-2 lg:py-4 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between lg:justify-start w-full">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-3 text-gray-600 rounded cursor-pointer lg:hidden">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="flex-grow flex justify-center lg:justify-start lg:hidden">
                    <a href="{{ Route('dashboard') }}"
                        class="flex items-center justify-center lg:justify-start text-base">
                        <img src="{{ asset('images/zenmultimedia.png') }}" class="h-12 lg:h-12"
                            alt="ZenMultimediaIndonesia" />
                    </a>
                </div>
                
                <p class="lg:flex lg:ml-64">
                    <span id="welcome-message"
                        class="hidden lg:inline text-gray-500 font-semibold text-sm lg:text-base ml-2"></span>
                </p>
            </div>
            <div class="flex flex-row space-x-4">
                <div class=z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700"
                    id="notification-dropdown">
                    <div
                        class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Notifications
                    </div>
                    <div>
                        <a href="#"
                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png"
                                    alt="Jese image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                        </path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message
                                    from <span class="font-semibold text-gray-900">Bonnie Green</span>:
                                    "Hey, what's up? All set for the presentation?"</div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">a few moments
                                    ago</div>
                            </div>
                        </a>
                        <a href="#"
                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/jese-leos.png"
                                    alt="Jese image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span
                                        class="font-semibold text-gray-900">Jese leos</span> and <span
                                        class="font-medium text-gray-900">5 others</span> started
                                    following you.</div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">10 minutes ago
                                </div>
                            </div>
                        </a>
                        <a href="#"
                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/joseph-mcfall.png"
                                    alt="Joseph image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span
                                        class="font-semibold text-gray-900">Joseph Mcfall</span> and
                                    <span class="font-medium text-gray-900">141 others</span> love your
                                    story. See it and view more stories.
                                </div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">44 minutes ago
                                </div>
                            </div>
                        </a>
                        <a href="#"
                            class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/leslie-livingston.png"
                                    alt="Leslie image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-green-400 border border-white rounded-full dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span
                                        class="font-semibold text-gray-900">Leslie Livingston</span>
                                    mentioned you in a comment: <span
                                        class="font-medium text-primary-700 dark:text-primary-500">@bonnie.green</span>
                                    what do you say?</div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">1 hour ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/robert-brown.png"
                                    alt="Robert image">
                                <div
                                    class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span
                                        class="font-semibold text-gray-900">Robert Brown</span> posted
                                    a new video: Glassmorphism - learn how to implement the new design trend.</div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">3 hours ago
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="#"
                        class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:underline">
                        <div class="inline-flex items-center ">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
                <div>
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="{{ Auth::user()->image_path }}" alt="Bonnie avatar">
                    </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown-2">
                    <div class="px-4 py-3" role="none">
                        <p class="text-sm text-gray-9000" role="none">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate" role="none">
                            {{ Auth::user()->email }}
                        </p>
                        <p class="text-sm font-medium mb-2 text-gray-900 truncate" role="none">
                            Role: <span class="text-blue-600">{{ Auth::user()->role }}</span>
                        </p>
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

<button data-modal-target="logout_modal" data-modal-toggle="logout_modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
</button>

<div id="logout_modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="logout_modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda Yakin Ingin Keluar Dari Halaman Ini?</h3>
                <div class="flex justify-center space-x-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button data-modal-hide="logout_modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, Saya Yakin
                        </button>
                    </form>
                    <button data-modal-hide="logout_modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Tidak, Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="preloader" class="fixed inset-0 bg-gray-800 bg-opacity-80 flex items-center justify-center z-[99]">
    <div class="absolute animate-spin rounded-full h-28 w-28 border-t-4 border-b-4 border-blue-500"></div>
    <img src="{{ asset('favicon.ico') }}" class="rounded-full h-20 w-20">
</div>