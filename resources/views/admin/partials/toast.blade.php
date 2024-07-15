@if(session('toast') == 'contact_success')
<div id="toast-add" class="toast-contact-message flex items-center w-full max-w-xs p-2 mb-4 my-6 text-gray-500 bg-white rounded-lg shadow fixed right-0 top- mr-4 mt-4 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <i class="fa-solid fa-circle-check"></i>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Data berhasil terkirim, tunggu balasan dalam waktu 24 jam.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 
        p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-add" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'add')
<div id="toast-add" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 my-6 text-gray-500 bg-white rounded-lg shadow fixed right-0 top-20 mr-4 mt-4 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <i class="fa-solid fa-circle-check"></i>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Tambah data Berhasil.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 
    p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-add" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif


@if(session('toast') == 'edit')
<div id="toast-edit" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 my-6 text-gray-500 bg-white rounded-lg shadow fixed right-0 top-20 mr-4 mt-4 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg">
        <i class="fa-solid fa-pen-to-square"></i>
        <span class="sr-only">Edit icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Data berhasil diupdate.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 
        p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-edit" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

@if(session('toast') == 'delete')
<div id="toast-delete" class="toast-message flex items-center w-full max-w-xs p-2 mb-4 my-6 text-gray-500 bg-white rounded-lg shadow fixed right-0 top-20 mr-4 mt-4 z-30"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
        <i class="fa-solid fa-trash-can"></i>
        <span class="sr-only">Trash icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Data berhasil dihapus.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 
    p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        data-dismiss-target="#toast-delete" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toasts = document.querySelectorAll('.toast-message');
        toasts.forEach(toast => {
            setTimeout(() => {
                toast.style.display = 'none';
            }, 5000);
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const toasts = document.querySelectorAll('.toast-contact-message');
        toasts.forEach(toast => {
            setTimeout(() => {
                toast.style.display = 'none';
            }, 30000);
        });
    });
</script>