@if ($promoSection)
    <button data-modal-target="pop-up" data-modal-toggle="pop-up" hidden class=""></button>

    <div id="pop-up" tabindex="2" data-modal-backdrop="static" aria-hidden="false"
        class="fixed inset-0 z-[99999] flex justify-center items-center bg-gray-900 bg-opacity-90 fade-in"
        data-aos-close="zoom-in-down" data-aos-close-duration="500">
        <div class="relative p-4 w-full max-w-sm lg:max-w-lg xl:max-w-xl mx-auto flex justify-center">
            <div class="relative rounded-xl p-1.5">
                <button type="button"
                    class="text-gray-400 right-0 top-0 absolute border border-gray-300 bg-gray-100 hover:bg-gray-300 hover:text-gray-600 transition duration-300 rounded-md text-sm w-6 h-6 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="pop-up" id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close Modal</span>
                </button>
                <div class="flex items-center justify-center shadow-sm rounded-xl shadow-gray-700 overflow-hidden">
                    <img class="rounded w-full h-auto"
                        src="{{ $promoSection->image_path 
                            ? asset('storage/uploads/promo/' . $promoSection->image_path) 
                            : asset('dist/validate/promo/contoh.jpg') }}" 
                        alt="Promo Image" />
                </div>                
            </div>
        </div>
    </div>
@endif
