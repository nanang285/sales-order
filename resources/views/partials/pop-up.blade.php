
<button data-modal-target="pop-up" data-modal-toggle="pop-up" hidden class=""></button>

@if($promoSection)
    <div id="pop-up" tabindex="2" data-modal-backdrop="static" aria-hidden="false" class="fixed inset-0 z-[99999] flex justify-center items-center transition duration-700 bg-black bg-opacity-70" data-aos-close="zoom-in-down" data-aos-close-duration="500">
        <div class="relative p-4 w-full max-w-3xl">
            <div class="relative rounded-md p-1.5">
                <button type="button" class="text-gray-400 right-0 top-0 absolute border border-gray-300 bg-gray-100 hover:bg-gray-300 hover:text-gray-600 transition duration-300 rounded-md text-sm w-6 h-6 ms-auto inline-flex justify-center items-center" data-modal-hide="pop-up">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="flex items-center justify-between shadow-sm rounded shadow-gray-700">
                    <img class="rounded max-w-full" src="{{ asset('storage/uploads/promo/' . $promoSection->image_path) }}"/>
                </div>
            </div>
        </div>
    </div>
@endif

