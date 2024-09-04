@extends('admin.layouts.main')
@section('container')
    <div class="relative">
        <div class="px-4">
            @include('admin.partials.breadcrumb')
            @include('admin.partials.toast')
          
        </div>
    </div>
    {{-- @include('admin.recruitment.modal') --}}

    <script>
        document.querySelectorAll('input[name="filter"]').forEach((filter) => {
            filter.addEventListener('change', function() {
                const selectedFilter = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('filter', selectedFilter);
                window.location.href = url.toString();
            });
        });
    </script>

    <script>
        document.querySelectorAll('[data-modal-target]').forEach(button => {
            button.addEventListener('click', function() {
                const filePath = this.getAttribute('data-file-path');
                const modal = document.getElementById(this.getAttribute('data-modal-target'));
                const iframe = modal.querySelector('#pdfFrame');

                iframe.src = filePath;
                modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById(this.getAttribute('data-modal-hide'));
                modal.classList.add('hidden');
            });
        });
    </script>
@endsection
