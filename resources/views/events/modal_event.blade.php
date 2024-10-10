@foreach ($events as $event)
<div id="static-modal_{{ $event->slug }}" data-modal-backdrop="static" tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <div class="absolute -top-3 -right-3 items-center justify-between">
                <button type="button"
                    class="text-gray-400 bg-gray-200 hover:bg-gray-300 hover:text-gray-500 border border-gray-400 rounded-lg text-sm w-7 h-7 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="static-modal_{{ $event->slug }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="bg-white rounded-md p-4 space-y-4">
                <h3 class="text-gray-700 text-center text-xl font-bold">Bagikan Link Acara</h3>
                <hr>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="https://api.whatsapp.com/send?text=Yuk,%20cek%20ini!%20Untuk%20mengikuti%20acara%20{{ urlencode($event->judul) }}%20yang%20akan%20diselenggarakan%20pada%20{{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('l, d F Y') }},%20Jam%20{{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('H:i') }},%20jangan%20sampai%20ketinggalan.%20Dapatkan%20tiket%20acara%20di%20link%20berikut:%20https://zenmultimedia.co.id/events/{{ $event->slug }}.%20Terima%20kasih!"
                        target="_blank"
                        class="transform transition-transform duration-300 hover:scale-110">
                        <img class="w-8 h-8 rounded-full"
                            src="{{ asset('dist/images/mediasocial/whatsapp.svg') }}">
                    </a>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://zenmultimedia.co.id/events/{{ $event->slug }}"
                        target="_blank"
                        class="transform transition-transform duration-300 hover:scale-110">
                        <img class="w-8 h-8 rounded-full"
                            src="{{ asset('dist/images/mediasocial/facebook.svg') }}">
                    </a>

                    <a href="mailto:?subject=Yuk, cek ini!&body=Untuk mengikuti acara {{ urlencode($event->judul) }} yang akan diselenggarakan pada {{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('l, d F Y') }}, Jam {{ \Carbon\Carbon::parse($event->waktu)->translatedFormat('H:i') }}, jangan sampai ketinggalan. Dapatkan tiket acara di link berikut: https://zenmultimedia.co.id/events/{{ $event->slug }}. Terima kasih!"
                        target="_blank"
                        class="transform transition-transform duration-300 hover:scale-110">
                        <img class="w-8 h-8 rounded-full"
                            src="{{ asset('dist/images/mediasocial/gmail.svg') }}">
                    </a>

                </div>

                <div class="w-full max-w-full">
                    <div class="relative">
                        <input id="npm-install-copy-button" type="text"
                            class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ route('detail-event', $event->slug) }}" disabled readonly>
                        <button data-copy-to-clipboard-target="npm-install-copy-button"
                            onclick="copyLink('{{ route('detail-event', $event->slug) }}')"
                            data-tooltip-target="tooltip-copy-npm-install-copy-button"
                            class="absolute hover:scale-110 end-2 top-1/2 -translate-y-1/2 text-gray-500 rounded-lg p-2 inline-flex items-center justify-center">
                            <span id="default-icon">
                                <i class="fa-solid fa-copy w-4 h-4"></i>
                            </span>
                        </button>

                        <script>
                            function copyLink(link) {
                                var tempInput = document.createElement("input");
                                tempInput.value = link;
                                document.body.appendChild(tempInput);

                                tempInput.select();
                                tempInput.setSelectionRange(0, 99999);

                                document.execCommand("copy");
                                document.body.removeChild(tempInput);

                                showToast("Link berhasil disalin ke clipboard.");
                            }

                            function showToast(message) {
                                var toast = document.createElement("div");
                                toast.className =
                                    "toast-message flex items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-green-200 rounded-lg shadow fixed left-1/2 transform -translate-x-1/2 top-20 z-[99]";
                                toast.setAttribute("role", "alert");

                                toast.innerHTML = `
                                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <span class="sr-only">Check icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal">${message}</div>
                                    <button type="button"
                                        class="ms-auto -mx-1.5 -my-1.5 bg-green-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-green-300 
                                        p-1.5 hover:bg-green-300 inline-flex items-center justify-center h-8 w-8"
                                        onclick="this.parentElement.remove()" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                `;

                                document.body.appendChild(toast);

                                setTimeout(function() {
                                    toast.remove();
                                }, 3000);
                            }
                        </script>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endforeach