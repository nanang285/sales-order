@if ($promoSection)
    <!-- Trigger Button (Hidden) -->
    <button id="open-popup" hidden></button>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-gray-900 bg-opacity-90 z-[99998] hidden"></div>

    <!-- Pop-up Container -->
    <div id="pop-up" tabindex="2" aria-hidden="false"
        class="fixed inset-0 z-[99999] flex justify-center items-center bg-transparent transition-opacity duration-300 opacity-0 pointer-events-none">
        <div
            class="relative p-4 w-full max-w-sm lg:max-w-lg xl:max-w-xl mx-auto flex justify-center">
            <div class="relative p-4">
                <!-- Close Button -->
                <button type="button"
                    class="text-gray-400 right-2 top-2 absolute border border-gray-300 bg-gray-100 hover:bg-gray-300 hover:text-gray-600 transition duration-300 rounded-md text-sm w-6 h-6 ms-auto inline-flex justify-center items-center"
                    id="close-popup">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close Pop-up</span>
                </button>
                <!-- Pop-up Content -->
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

    <!-- JavaScript for Pop-up Functionality -->
    <script>
        const overlay = document.getElementById('overlay');
        const popUp = document.getElementById('pop-up');
        const openPopupButton = document.getElementById('open-popup');
        const closePopupButton = document.getElementById('close-popup');
        const body = document.body;

        // Open Popup
        function openPopup() {
            overlay.classList.remove('hidden');
            popUp.classList.remove('opacity-0', 'pointer-events-none');
            popUp.classList.add('opacity-100', 'pointer-events-auto');
            body.style.overflow = 'hidden'; // Disable scrolling
        }

        // Close Popup
        function closePopup() {
            overlay.classList.add('hidden');
            popUp.classList.remove('opacity-100', 'pointer-events-auto');
            popUp.classList.add('opacity-0', 'pointer-events-none');
            body.style.overflow = ''; // Enable scrolling
        }

        // Event Listeners
        openPopupButton.addEventListener('click', openPopup);
        closePopupButton.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);

        // For demonstration purposes, simulate opening the pop-up
        document.addEventListener('DOMContentLoaded', function() {
            openPopupButton.click();
        });
    </script>
@endif
