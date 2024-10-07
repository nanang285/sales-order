<aside id="sidebar"
    class="fixed top-0 rounded-r-xl left-0 z-30 md:z-[35] w-64 h-full font-normal duration-75 transition-width overflow-y-auto"
    aria-label="Sidebar">
    <div class="relative flex flex-col pt-0 border-r h-full border-gray-200">
        <div class="flex flex-col flex-1 h-full">
            <div class="flex-1 px-6 space-y-1 py-5 bg-primary">
                <div class= "mx-auto flex-grow flex justify-center lg:justify-start lg:flex-grow-0">
                    <a href="{{ Route('dashboard') }}"
                        class="flex items-center justify-center lg:justify-start text-base">
                        <img src="{{ asset('dist/images/logo/zmi-logo-2.webp') }}" class="h-12 lg:h-11 lg:items-center"
                            alt="zen-multimedia-logo" />
                    </a>
                </div>
                <ul class="space-y-2">

                    <li class="mt-4">
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                            <i class="fa-solid fa-gauge text-base"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <a href="{{ route('admin.employees.index') }}"
                            class="{{ Route::currentRouteName() === 'admin.employees.index' ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                            <i class="fa-solid fa-user-group text-base"></i>
                            <span class="ml-3">Karyawan</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <a href="{{ route('admin.attendance.index') }}"
                            class="{{ Route::currentRouteName() === 'admin.attendance.index' ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                            <i class="fa-solid fa-user-clock text-base"></i>
                            <span class="ml-3">Absensi</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('admin.recruitment.index') }}"
                            class="{{ Route::currentRouteName() === 'admin.recruitment.index' ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg hover:bg-[#bdd4f69d] group transition duration-300">

                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Rekrutmen</span>
                        </a>
                    </li> --}}

                    <div>
                        <button type="button" id="dropdownButton4"
                            class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-300 rounded-lg group hover:bg-[#bdd4f69d] transition duration-300"
                            aria-controls="recruitment" data-collapse-toggle="recruitment">
                            <i class="fa-solid fa-address-card"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>
                                Rekrutmen
                            </span>
                            <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                        </button>
                        <ul id="recruitment" class="hidden pl-5 space-y-1 py-2">
                            <li>
                                <a href="{{ route('admin.recruitment.index') }}"
                                    class="{{ Request::is('admin/recruitment') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Data Pelamar</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{route('admin.recruitment.email')}}"
                                    class="{{ Request::is('admin/recruitment/email') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Email Verifikasi</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>

                    <div>
                        <button type="button" id="dropdownButton"
                            class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-300 rounded-lg group hover:bg-[#bdd4f69d] transition duration-300"
                            aria-controls="beranda" data-collapse-toggle="beranda">
                            <i class="fa-solid fa-building-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Tentang
                                Kami</span>
                            <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                        </button>
                        <ul id="beranda" class="hidden pl-5 space-y-1 py-2">
                            <li>
                                <a href="{{ route('admin.about-us.index') }}"
                                    class="{{ Request::is('admin/about-us') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Tentang</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.visi-misi.index') }}"
                                    class="{{ Request::is('admin/visi-misi') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Visi & Misi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.homepages.our-team.index') }}"
                                    class="{{ Request::is('admin/homepages/our-team') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Our Team</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <button type="button" id="dropdownButton3"
                        class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-300 rounded-lg group hover:bg-[#bdd4f69d] transition duration-300"
                        aria-controls="event" data-collapse-toggle="event">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Daftar Acara</span>
                        <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                    </button>
                    <ul id="event" class="hidden pl-5 space-y-1">
                        <li>
                            <a href="{{ route('admin.events.index') }}"
                                class="{{ Request::is('admin/events') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                <i class="fa-solid fa-circle text-xs"></i>
                                <span class="ml-3">Acara</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.events.payments') }}"
                                class="{{ Request::is('admin/events/payments') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                <i class="fa-solid fa-circle text-xs"></i>
                                <span class="ml-3">Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.events.ticket')}}"
                                class="{{ Request::is('admin/events/ticket') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                <i class="fa-solid fa-circle text-xs"></i>
                                <span class="ml-3">Tiket</span>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <button type="button" id="dropdownButton2"
                            class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-300 rounded-lg group hover:bg-[#bdd4f69d] transition duration-300"
                            aria-controls="homepages" data-collapse-toggle="homepages">
                            <i class="fa-solid fa-house-chimney"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Beranda</span>
                            <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                        </button>
                        <ul id="homepages" class="hidden pl-5 space-y-1">
                            <li class="mt-2">
                                <a href=" {{ Route('admin.homepages.promo.index') }} "
                                    class="{{ Request::is('admin/homepages/promo') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">PopUp</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.service.index') }}"
                                    class="{{ Request::is('admin/homepages/service') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Layanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.about.index') }}"
                                    class="{{ Request::is('admin/homepages/about') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.project.index') }}"
                                    class="{{ Request::is('admin/homepages/project') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Portofolio</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.galery.index') }}"
                                    class="{{ Request::is('admin/homepages/galery') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Galeri</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.client.index') }}"
                                    class="{{ Request::is('admin/homepages/client') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Klien</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('admin.homepages.footer.index') }}"
                                    class="{{ Request::is('admin/homepages/footer') ? 'text-gray-200 bg-[#bdd4f69d]' : 'text-gray-300' }} flex items-center px-4 py-2.5 font-semibold text-base rounded-lg pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Footer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton');
            const links = document.querySelectorAll('#beranda a');

            links.forEach(link => {
                if (link.classList.contains('text-gray-200')) {
                    dropdownButton.classList.add('text-gray-200', 'bg-[#bdd4f69d]');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton2');
            const links = document.querySelectorAll('#homepages a');

            links.forEach(link => {
                if (link.classList.contains('text-gray-200')) {
                    dropdownButton.classList.add('text-gray-200', 'bg-[#bdd4f69d]');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton3');
            const links = document.querySelectorAll('#event a');

            links.forEach(link => {
                if (link.classList.contains('text-gray-200')) {
                    dropdownButton.classList.add('text-gray-200', 'bg-[#bdd4f69d]');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton4');
            const links = document.querySelectorAll('#recruitment a');

            links.forEach(link => {
                if (link.classList.contains('text-gray-200')) {
                    dropdownButton.classList.add('text-gray-200', 'bg-[#bdd4f69d]');
                }
            });
        });
    </script>
</aside>
