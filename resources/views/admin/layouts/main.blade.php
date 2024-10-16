@include('partials.start')

@include('admin.layouts.navbar')

<div class="flex pt-11 overflow-hidden">
    @include('admin.layouts.sidebar')
    <div class="fixed inset-0 z-10 hidden" id="sidebarBackdrop"></div>
    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64 pb-10">
      <main>
          @yield('container')
      </main>
    </div>
</div>
  
  @include('partials.end')
  
