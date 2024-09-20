@include('partials.start')
@include('admin.layouts.navbar')
@include('components.preloader')
<div class="flex pt-11 overflow-hidden">
    @include('admin.layouts.sidebar')
    <div class="fixed inset-0 z-10 hidden" id="sidebarBackdrop"></div>
    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64 pb-10">
        <main>
            @if (session()->has('Error'))
                <div id="error-alert" class="alert alert-danger ml-5 mb-4 text-base font-semibold text-red-600">
                    {{ session('Error') }}
                </div>
            @endif
            @yield('container')
        </main>
    </div>
</div>

@include('partials.end')
