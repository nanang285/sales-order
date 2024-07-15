<header id="navbar" class="bg-primary fixed shadow-gray-700 lg:p-5 p-4 top-0 w-full transition-shadow duration-300">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex-shrink-0 lg:ml-8">
            <a class="" href="#home">
                <img src="{{ asset('images/zmi-brand.png') }}" alt="Icon ZMI" class="h-10 md:h-12" />
            </a>
        </div>
        <div class="hidden md:flex space-x-11 text-base font-semibold">
            <a href="{{ Request::is('/') ? '#home' : url('/') }}"
                class="{{ Request::is('index') ? 'text-white' : '' }} text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none"
                id="home-link">
                Beranda
            </a>

            <a href="#services" id="services-link"
                class="text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none">
                Layanan
            </a>

            <a href="#about" id="about-link"
                class="text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none {{ request()->is('*#about') || request()->segment(1) == 'about' ? 'text-white animate-bounce' : '' }}">
                Profil
            </a>

            <a href="{{ url('contact') }}"
                class="{{ Request::is('contact') ? 'text-white' : '' }} text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none">
                Kontak
            </a>

        </div>

        <div class="flex items-center flex-shrink-0 lg:mx-24">
            <!-- Tombol Masuk -->
            <a href="{{ Route('login') }}" target="_blank"
                class="{{ Request::is('login') || Request::is('register') ? 'hidden' : '' }} hidden hover:animate-wiggle focus:animate-none  items-center justify-center border border-white-600 
            text-white lg:px-5 lg:py-1 px-3 py-0.5 rounded-md hover:bg-white hover:text-blue-900 transition duration-300">
                <span class="text-sm md:text-base font-semibold">
                    Masuk
                </span>
            </a>

            {{-- Menu Burger --}}
            <div class="md:hidden ml-4">
                <div class="navbar-burger flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-white rounded cursor-pointer transition duration-500 lg:hidden">
                      <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                      <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="navbar-menu hidden md:hidden flex-col text-center">

        <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg bg-primary md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-blue ">
            <li class="{{ Request::is('') ? 'bg-gray-300 rounded-md' : '' }} mb-1.5">
                <a href="#home"
                    class="block text-base py-1 px-3 text-gray-700  rounded md:bg-transparent bg-gray-100 hover:bg-gray-300 hover:text-gray-800 transition duration-300"
                    aria-current="page">
                    Beranda
                </a>
            </li>
            <li class="{{ Request::is('index') ? 'bg-blue-600 rounded-md' : '' }} mb-1.5">
                <a href="#services"
                    class="block text-base py-1 px-3 text-gray-700  rounded md:bg-transparent bg-gray-100 hover:bg-gray-300 hover:text-gray-800 transition duration-300"
                    aria-current="page">
                    Layanan
                </a>
            </li>
            <li class="{{ Request::is('index') ? 'bg-blue-600 rounded-md' : '' }} mb-1.5">
                <a href="#about"
                    class="block text-base py-1 px-3 text-gray-700  rounded md:bg-transparent bg-gray-100 hover:bg-gray-300 hover:text-gray-800 transition duration-300"
                    aria-current="page">
                    Profil
                </a>
            </li>
            <li class="{{ Request::is('index') ? 'bg-blue-600 rounded-md' : '' }} mb-1.5">
                <a href="{{ url('contact') }}"
                    class="block text-base py-1 px-3 text-gray-700  rounded md:bg-transparent bg-gray-100 hover:bg-gray-300 hover:text-gray-800 transition duration-300"
                    aria-current="page">
                    Kontak
                </a>
            </li>
    </div>
</header>
