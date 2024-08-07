<script>
    AOS.init();
</script>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

{{-- <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script> --}}

<script>
     $(document).ready(function() {
            const $navbar = $('#navbar');
            const $shadowSection = $('#shadow');

            function checkScroll() {
                const shadowSectionTop = $shadowSection.offset().top - $(window).scrollTop();
                if (shadowSectionTop <= 50) {
                    $navbar.addClass('backdrop-blur-md bg-primary/50');
                } else {
                    $navbar.removeClass('backdrop-blur-md bg-primary/50');
                }
            }

            $(window).on('scroll', checkScroll);
            checkScroll();
        });

    $(document).ready(function() {
        const $toggleButton = $('#toggleSidebarMobile');
        const $sidebar = $('#sidebar');
        const $hamburgerIcon = $('#toggleSidebarMobileHamburger');
        const $closeIcon = $('#toggleSidebarMobileClose');

        $toggleButton.on('click', function() {
            $sidebar.toggleClass('hidden');
            $hamburgerIcon.toggleClass('hidden');
            $closeIcon.toggleClass('hidden');
        });
    });

    $(document).ready(function() {
        const text = "Selamat datang di halaman dashboard Zen Multimedia.";
        const $welcomeMessage = $('#welcome-message');
        let index = 0;

        function typeWriter() {
            if (index < text.length) {
                $welcomeMessage.html($welcomeMessage.html() + text.charAt(index));
                index++;
                setTimeout(typeWriter, 50);
            }
        }

        typeWriter();
    });

    function togglePasswordVisibility() {
        var $passwordInput = $("#password");
        var currentType = $passwordInput.attr("type");

        $passwordInput.attr("type", currentType === "password" ? "text" : "password");
    }
</script>

</body>

</html>
