<aside id="sidebar"
    class="fixed top-0 rounded-r-xl left-0 z-30 md:z-[35] w-64 h-full font-normal duration-75 transition-width overflow-y-auto"
    aria-label="Sidebar">
    <div class="relative flex flex-col pt-0 border-r h-full border-gray-200">
        <div class="flex flex-col flex-1 h-full">
            <div class="flex-1 px-6 space-y-1 py-5 bg-primary">
                <div class="flex-grow flex justify-center lg:justify-start lg:flex-grow-0">
                    <a href="{{ Route('dashboard') }}"
                        class="flex items-center justify-center lg:justify-start text-base">
                        <img src="{{ asset('dist/images/logo/zmi-logo-1.webp') }}" class="h-12 lg:h-11 lg:items-center"
                            alt="zen-multimedia-logo" />
                    </a>
                </div>
                <ul class="space-y-2">

                    <li class="mt-4">
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                            <i class="fa-solid fa-gauge text-base"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <a href="#"
                            class="{{ Route::currentRouteName() === 'admin.karyawan' ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                            <i class="fa-solid fa-building-user text-base"></i>
                            <span class="ml-3">Karyawan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.recruitment.index') }}"
                            class="{{ Route::currentRouteName() === 'admin.recruitment.index' ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg hover:bg-[#bdd4f69d] group transition duration-300">
                            <i class="fa-solid fa-id-card text-base"></i>

                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Recruitment</span>
                        </a>
                    </li>

                    <li class="">
                        <a href=""
                            class="{{ Route::currentRouteName() === 'admin.job.index' ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg hover:bg-[#bdd4f69d] group transition duration-300">
                            <i class="fa-solid fa-users-viewfinder"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Job
                                Vacancies</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ Route('admin.absensi.index') }}"
                            class="{{ Route::currentRouteName() === 'admin.absensi.index' ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg hover:bg-[#bdd4f69d] group transition duration-300">
                            <i class="fa-solid fa-fingerprint"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Absensi</span>
                        </a>
                    </li>

                    <li>
                        <button type="button" id="dropdownButton"
                            class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-300 rounded-lg group hover:bg-[#bdd4f69d] transition duration-300"
                            aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts">
                            <i class="fa-solid fa-house-chimney"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Homepages</span>
                            <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                        </button>
                        <ul id="dropdown-layouts" class="hidden pl-5 space-y-1">
                            <li class="mt-2">
                                <a href=" {{ Route('admin.homepages.promo.index') }} "
                                    class="{{ Request::is('admin/promo') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">PopUp</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.service.index') }}"
                                    class="{{ Request::is('admin/service') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Layanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.about.index') }}"
                                    class="{{ Request::is('admin/about') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.project.index') }}"
                                    class="{{ Request::is('admin/project') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Portofolio</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.galery.index') }}"
                                    class="{{ Request::is('admin/galery') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Galeri</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.client.index') }}"
                                    class="{{ Request::is('admin/client') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Klien</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.footer.index') }}"
                                    class="{{ Request::is('admin/footer') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Footer</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                        <div class="flex items-center mb-3">
                            <span
                                class="bg-orange-100 text-orange-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Notes</span>
                            <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 inline-flex justify-center items-center w-6 h-6 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800"
                                data-dismiss-target="#dropdown-cta" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                            Kelola data dan pantau aktivitas dari sini.
                        </p>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    
</aside>