// import './bootstrap';
import 'flowbite';
// import '../css/app.css';



      // Burger Menu Navbar
      $(document).ready(function () {
        var animationDuration = 300;

        $(".navbar-burger").on("click", function () {
            $(".navbar-menu").slideToggle(animationDuration);
        });

        // $(".navbar-menu a").on("click", function () {
        //     $(".navbar-menu").slideUp(animationDuration);
        // });

        // $(document).on("click", function (event) {
        
        //     if (!$(event.target).closest('.navbar-burger, .navbar-menu').length) {
        //         $(".navbar-menu").slideUp(animationDuration);
        //     }
        // });

        // $(window).on("scroll", function () {
        //     $(".navbar-menu").slideUp(animationDuration);
        // });

        $(window).on("resize", function () {
            $(".navbar-menu").slideUp(animationDuration);
        });
    });

    
    // Link Active 
    $(document).ready(function() {
        function checkVisibility(sectionId, linkId) {
            var section = $(sectionId);
            var link = $(linkId);
            var scrollPos = $(window).scrollTop();
            var sectionTop = section.offset().top;
            var sectionBottom = sectionTop + section.height();

            if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                link.addClass('text-white');
                $('#home-link').removeClass('text-white');
            } else {
                link.removeClass('text-white');
            }
        }

        $(window).on('scroll', function() {
            checkVisibility('#about', '#about-link');
            checkVisibility('#services', '#services-link');
            checkVisibility('#latest', '#latest-link');
            checkVisibility('#footer', '#footer-link');

            if (!$('#about-link').hasClass('text-white') && !$('#services-link').hasClass(
                'text-white')) {
                $('#home-link').addClass('text-white');
            }
        });
    });

    
    //  Swipper Latest Project
    $(document).ready(function() {
        var swiperLatestProject = new Swiper('.swiper-latest-project', {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                1024: {
                    slidesPerView: 1.7,
                    spaceBetween: 45,
                },
            },
            navigation: {
                nextEl: '.swiper-latest-project .button-prev', // Ubah prevEl menjadi nextEl
            },
            loop: true,
        });

        $('.button-next').on('click', function() {
            swiperLatestProject.slideNext(); // Ubah slidePrev menjadi slideNext
        });
    });


    // Swipper Client
    $(document).ready(function() {
        var swiperKlienKami = new Swiper('.swiper-klien-kami', {
            slidesPerView: 2,
            spaceBetween: 13,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
            },
            pagination: {
                el: '.swiper-klien-kami .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-klien-kami .swiper-button-next',
                prevEl: '.swiper-klien-kami .swiper-button-prev',
            },
            loop: true,
            autoplay: {
                delay: 3000, // Mengatur Delay Swipper
                disableOnInteraction: false, // Auto Slider ON/OFF
            },
        });
    });














