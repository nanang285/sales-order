<!-- Footer -->
<footer id="footer" class="bg-primary text-gray-300">
    <div class="container mx-auto px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="space-y-6">
                <div>
                    <h2 class="text-lg font-semibold mb-4">Alamat</h2>
                    <p class="max-w-xs text-sm hover:text-white transition duration-400">{{ $footerSection->alamat }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-4">Social Media</h2>
                    <div class="flex space-x-4">
                        <a class="text-xl hover:text-white transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_1 }}">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a class="text-xl hover:text-white transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_2 }}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a class="text-xl hover:text-white transition duration-400" target="_blank"
                            href="{{ $footerSection->sosmed_3 }}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Hubungi</h2>
                <p class="text-sm mb-4">Tertarik bekerja sama dengan kami?</p>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2 hover:text-white">
                        <i class="fa-brands fa-whatsapp"></i>
                        <p class="text-sm transition duration-400" target="_blank">{{ $footerSection->no_telp }}</p>
                    </li>
                    <li class="flex items-center space-x-2 hover:text-white">
                        <i class="fa-regular fa-envelope"></i>
                        <p class="text-sm transition duration-400 break-all">{{ $footerSection->email }}</p>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Lokasi Kami</h2>
                <iframe class="w-full h-48 lg:h-52 rounded-md"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d68498.83710028561!2d107.42375149278843!3d-6.542656233220349!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690f462aae41f9%3A0xd11c7fe16752f4c!2sPT%20Zen%20Multimedia%20Indonesia!5e0!3m2!1sid!2sid!4v1718251973161!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
    <div class=" py-6 text-center">
        <span class="text-base font-semibold text-gray-400">&copy; {{ date('Y') }} zenmultimediacorp.com. All rights
            reserved.
        </span>
    </div>
</footer>
<!-- Footer -->
