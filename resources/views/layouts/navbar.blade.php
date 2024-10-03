<header data-aos="fade-down" id="navbar" class="z-[9999] bg-transparant fixed shadow-gray-800 lg:p-4.5 p-4 top-0 w-full transition duration-300">
    <div class="container lg:px-8 flex flex-wrap items-center justify-between mx-auto">
        <div class="lg-ml-8">
            <a class="" href="{{ Request::is('/') ? '#home' : url('') }}">
                <img src="{{ asset('dist/images/logo/zmi-logo-2.webp') }}" alt="Icon ZMI" class="h-11 md:h-12" />
            </a>
        </div>
        <button data-collapse-toggle="navbar-default" id="toggleSidebarMobile" aria-expanded="false" aria-controls="sidebar" class="p-2 text-gray-200 rounded cursor-pointer md:hidden">
            <svg id="toggleSidebarMobileClose" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-semibold text-base flex flex-col md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0">
                <li class="my-1">
                    <a href="{{ Request::is('/') ? '#home' : url('') }}"
                        class="{{ Request::is('/') ? 'text-white' : '' }} text-gray-300 relative hover:text-white focus:text-white text-base font-semibold"
                        id="home-link">
                        Beranda
                    </a>
                </li>
                <li class="my-1">
                    <a href="{{ Route('portofolio') }}" id="services-link"
                        class="{{ Request::is('portfolio') ? 'text-white' : '' }} text-gray-300 relative hover:text-white focus:text-white text-base font-semibold">
                        Portofolio
                    </a>
                </li>
                <li class="my-1">
                    <a href="{{ Route('aboutme') }}" id="services-link"
                        class="{{ Request::is('about-me') ? 'text-white' : '' }} text-gray-300 relative hover:text-white focus:text-white text-base font-semibold">
                        Tentang Kami
                    </a>
                </li>
                <li class="my-1">
                    <a href="{{ url('documentation') }}"
                        class="{{ Request::is('documentation') ? 'text-white' : '' }} text-gray-300 relative hover:text-white focus:text-white text-base font-semibold">
                       Dokumentasi
                    </a>
                </li>
                <li class="my-1">
                    <a href="{{ Route('events') }}" id="services-link"
                        class="{{ Request::is('event') ? 'text-white' : '' }} text-gray-300 relative hover:text-white focus:text-white text-base font-semibold">
                        Temukan Acara
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

