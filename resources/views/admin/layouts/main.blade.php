@include('partials.start')
@include('admin.layouts.navbar')
@include('components.preloader')
<div class="flex pt-11 overflow-hidden">
    @include('admin.layouts.sidebar')
    <div class="fixed inset-0 z-10 hidden" id="sidebarBackdrop"></div>
    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64 pb-10">
        <main>
            @if (session()->has('Error'))
                <div
                    class="alert alert-danger ml-5 mb-4 text-base font-semibold text-red-600 bg-red-200 border border-red-400 rounded p-4">
                    {{ session('Error') }}
                </div>
            @endif
            @if ($errors->any())
            <div id="toast-error" class="toast-message flex items-center w-full max-w-xl p-2 mb-4 text-gray-500 bg-red-200 border border-red-400 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-4 z-30"
                role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <i class="fa-solid fa-exclamation-circle"></i>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-red-300 
                    p-1.5 hover:bg-red-300 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif
            
            @yield('container')
        </main>
    </div>
</div>

@include('partials.end')
 