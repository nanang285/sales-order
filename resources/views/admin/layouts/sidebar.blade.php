<aside id="sidebar"
    class="fixed top-0 my-6 left-0 z-20 w-72 h-full font-normal duration-75 transition-width overflow-y-auto"
    aria-label="Sidebar">
    <div class="mt-11 relative flex flex-col pt-0 border-r h-full border-gray-200">
        <div class="flex flex-col flex-1 h-full">
            <div class="flex-1 px-6 space-y-1 py-6 bg-white divide-y divide-gray-200">
                <ul class="space-y-1">
                    <li class="">
                        <a href="{{ route('dashboard') }}"
                            class="{{ Request::is('admin/dashboard') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center mt-4 px-4 py-2.5 font-semibold text-base rounded hover:bg-[#bdd4f69d] group transition duration-300">
                            <i class="fa-solid fa-gauge"></i>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>

                    </li>
                    <li class="">
                        <a href="{{ Route('recruitment') }}"
                            class="{{ Request::is('admin/recruitment') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base text-gray-500 rounded hover:bg-[#bdd4f69d] group transition duration-300">
                            <i class="fa-solid fa-id-card"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Recruitment</span>
                            <span
                                class="ms-9 bg-blue-200 text-blue-800 text-xs font-semibold right-0 px-2.5 py-0.5 rounded-full">8</span>
                        </a>
                    </li>

                    <li>
                        <button type="button" id="dropdownButton"
                            class="flex items-center w-full font-semibold text-base px-4 py-2.5 text-gray-500 rounded group hover:bg-[#bdd4f69d] transition duration-300"
                            aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts">
                            <i class="fa-solid fa-house-chimney"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Homepages</span>
                            <i class="fa-solid fa-chevron-down transition-transform animate-bounce duration-300"></i>
                        </button>  
                        <ul id="dropdown-layouts" class="hidden pl-5 space-y-1">
                            <li class="mt-2">
                                <a href=" {{ Route('promo') }} "
                                    class="{{ Request::is('admin/promo') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Promo</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('hero') }}"
                                    class="{{ Request::is('admin/hero') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Beranda</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('service') }}"
                                    class="{{ Request::is('admin/service') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Layanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('about') }}"
                                    class="{{ Request::is('admin/about') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('project') }}"
                                    class="{{ Request::is('admin/project') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Portofolio</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('galery') }}"
                                    class="{{ Request::is('admin/galery') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Galeri</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('client') }}"
                                    class="{{ Request::is('admin/client') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Klien</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('footer') }}"
                                    class="{{ Request::is('admin/footer') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded pl-4 group hover:bg-[#bdd4f69d] transition duration-300">
                                    <i class="fa-solid fa-circle text-xs"></i>
                                    <span class="ml-3">Footer

                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <ul class="pt-2 space-y-2">
                    <a href="#" target=""
                        class="{{ Request::is('admin/user') ? 'text-blue-600 bg-[#bdd4f69d]' : 'text-gray-500' }} flex items-center px-4 py-2.5 font-semibold text-base rounded hover:bg-[#bdd4f69d] group transition duration-300">
                        <i class="fa-solid fa-user"></i>
                        <span class="ml-3" sidebar-toggle-item>Pengguna</span>
                    </a>
                </ul>

            </div>
        </div>
    </div>
</aside>

<script>
    $(document).ready(function() {
        var $dropdownButton = $('#dropdownButton');
        var $dropdown = $('#dropdown-layouts');

        // Retrieve the state from localStorage
        var isDropdownVisible = localStorage.getItem('dropdownVisible') === 'true';

        // Set the initial state based on localStorage
        if (isDropdownVisible) {
            $dropdown.removeClass('hidden').addClass('block');
        } else {
            $dropdown.removeClass('block').addClass('hidden');
        }

        // Toggle the dropdown on button click
        $dropdownButton.on('click', function() {
            var isVisible = $dropdown.hasClass('block');
            if (isVisible) {
                $dropdown.removeClass('block').addClass('hidden');
                localStorage.setItem('dropdownVisible', 'false');
            } else {
                $dropdown.removeClass('hidden').addClass('block');
                localStorage.setItem('dropdownVisible', 'true');
            }
        });
    });
</script>
