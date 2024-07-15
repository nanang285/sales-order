<header id="navbar" class="bg-primary fixed shadow-gray-700 p-5 top-0 transition-shadow duration-300">
    <div class=" flex items-center justify-between">
        <div class="flex-shrink-0 lg:ml-8">
            <a class="" href="#home">
                <img src="{{ asset('images/zmi-brand.png') }}" alt="Icon ZMI" class="h-9 md:h-12" />
            </a>
        </div>
        <div class="hidden md:flex space-x-11 text-base font-semibold">
            <a href="{{ Request::is('index') ? '#home' : url('index') }}"
                class="{{ Request::is('index') ? 'text-white' : '' }} text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none" id="home-link">
                Home
            </a>

            <a href="#about" id="about-link" class="text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none {{ request()->is('*#about') || request()->segment(1) == 'about' ? 'text-white animate-bounce' : '' }}">
                About
            </a>

            <a href="#services" id="services-link" class="text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none">
                Services
            </a>

            <a href="{{ url('contact') }}"
                class="{{ Request::is('contact') ? 'text-white' : '' }} text-gray-400 hover:text-white hover:animate-wiggle focus:animate-none">
                Contact
            </a>

        </div>
        
        <div class="flex items-center flex-shrink-0 lg:mx-8">
            <!-- Tombol Masuk -->
            <a href="{{ Route('login') }}"
                class="{{ Request::is('login') ? 'hidden' : '' }} hover:animate-wiggle focus:animate-none flex items-center justify-center border border-white-600 
                text-white px-5 py-1 rounded-lg hover:bg-white hover:text-blue-900 transition duration-300">
                <span class="text-base font-semibold">Masuk</span>
            </a>

            {{-- Menu Burger --}}
            <div class="md:hidden ml-4">
                <button class="navbar-burger text-white ">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 23 23"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

    </div>

    <!-- Mobile menu -->
    <div class="navbar-menu hidden md:hidden flex-col text-center">

        <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-primary md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-blue ">
            <li class="{{ Request::is('index') ? 'bg-blue-600 rounded-md' : '' }} my-1">
                <a href="{{ url('') }}"
                    class="block py-2 px-3 text-white  rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                    aria-current="page">
                    Home
                </a>
            </li>
            <li class="my-1">
                <a href="#about"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                    About
                </a>
            </li>
            <li class="my-1">
                <a href="#Service"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                    Services
                </a>
            </li>
            <li class="{{ Request::is('contact') ? 'bg-blue-600 rounded-md' : '' }} my-1">
                <a href="{{ url('contact') }}"
                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                    Contact
                </a>
            </li>
    </div>
</header>
