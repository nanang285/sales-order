@include('partials.start')

@include('admin.layouts.navbar')

<div class="flex pt-16 overflow-hidden bg-gray-200 dark:bg-gray-900">
    @include('admin.layouts.sidebar')

    <div class="fixed inset-0 z-10 hidden" id="sidebarBackdrop"></div>

    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-72 pb-16">
      <main>
          @yield('container')
      </main>
    </div>
  </div>
  
  @include('partials.end')
  
