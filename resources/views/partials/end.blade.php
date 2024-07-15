{{-- Swipper Script --}}
<script>
    AOS.init();
</script>

{{-- JQuery --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- <script src="{{ asset('swipers/swiper-bundle.min.js') }}"></script> --}}

{{-- LightBox Image --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

{{-- Datatables --}}
{{-- <script src="https://cdn.tailwindcss.com"></script --}}
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>

<script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.getElementById('preloader').style.display = 'none';
        }, 800);
    });
</script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({

        });
    });
</script>

<script>
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
</script>

<script>
    $(document).ready(function() {
        const $navbar = $('#navbar');
        const $servicesSection = $('#shadow');

        function checkScroll() {
            const servicesSectionTop = $servicesSection.offset().top - $(window).scrollTop();
            if (servicesSectionTop <= 50) {
                $navbar.addClass('shadow-sm');
            } else {
                $navbar.removeClass('shadow-sm');
            }
        }

        $(window).on('scroll', checkScroll);
        checkScroll();
    });

    // Sidebar > Admin
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

    // Text Dashboard Admin
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

    //show password
    function togglePasswordVisibility() {
        var $passwordInput = $("#password");
        var currentType = $passwordInput.attr("type");

        $passwordInput.attr("type", currentType === "password" ? "text" : "password");
    }
</script>

</body>

</html>
