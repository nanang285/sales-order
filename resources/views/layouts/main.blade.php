@include('partials.start')
@include('layouts.navbar')
@include('components.preloader')
{{-- @include('partials.pop-up') --}}
<main>
    @yield('container')
</main>
@include('components.chatbubble')
@include('partials.footer')
@include('partials.end')