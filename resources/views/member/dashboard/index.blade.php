@include('partials.start')
 {{-- @include('admin.layouts.navbar') --}}
 <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        {{ __('Ya') }}
    </button>
</form>