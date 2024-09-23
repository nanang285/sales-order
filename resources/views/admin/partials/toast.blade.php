@if(session('toast') == 'error')
<div id="toast-error" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-red-200 border border-red-400 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Terjadi kesalahan.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-red-300 
        p-1.5 hover:bg-red-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-error" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'add')
<div id="toast-add" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-green-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <i class="fa-solid fa-circle-check"></i>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Tambah data Berhasil.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-green-300 
        p-1.5 hover:bg-green-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-add" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'edit')
<div id="toast-edit" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-blue-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg">
        <i class="fa-solid fa-pen-to-square"></i>
        <span class="sr-only">Edit icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Data berhasil diupdate.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-blue-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-300 
        p-1.5 hover:bg-blue-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-edit" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'delete')
<div id="toast-delete" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-red-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
        <i class="fa-solid fa-trash-can"></i>
        <span class="sr-only">Delete icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Data berhasil dihapus.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-red-300 
        p-1.5 hover:bg-red-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-delete" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'logout')
<div id="toast-logout" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-yellow-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-yellow-500 bg-yellow-100 rounded-lg">
        <i class="fa-solid fa-sign-out-alt"></i>
        <span class="sr-only">Logout icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Anda Telah Keluar</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-yellow-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-yellow-300 
        p-1.5 hover:bg-yellow-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-logout" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'warning')
<div id="toast-warning" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-yellow-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-2 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-yellow-500 bg-yellow-100 rounded-lg">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span class="sr-only">Warning icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Anda tidak memiliki Akses.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-yellow-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-yellow-300 
        p-1.5 hover:bg-yellow-300 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-warning" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

<script>
    $(document).ready(function() {
        $('.toast-message').each(function() {
            var $toast = $(this);
            setTimeout(function() {
                $toast.fadeOut();
            }, 3000);
        });
    });
</script>
