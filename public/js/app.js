    // // Burger Menu Navba
    // $(document).ready(function () {
    //     var animationDuration = 300;

    //     $(".navbar-burger").on("click", function () {
    //         $(".navbar-menu").slideToggle(animationDuration);
    //     });

    //     $(".navbar-menu a").on("click", function () {
    //         $(".navbar-menu").slideUp(animationDuration);
    //     });

    //     // $(document).on("click", function (event) {
        
    //     //     if (!$(event.target).closest('.navbar-burger, .navbar-menu').length) {
    //     //         $(".navbar-menu").slideUp(animationDuration);
    //     //     }
    //     // });

    //     // $(window).on("scroll", function () {
    //     //     $(".navbar-menu").slideUp(animationDuration);
    //     // });

    //     $(window).on("resize", function () {
    //         $(".navbar-menu").slideUp(animationDuration);
    //     });
    // });

    
    // // Link Active 
    // $(document).ready(function() {
    //     function checkVisibility(sectionId, linkId) {
    //         var section = $(sectionId);
    //         var link = $(linkId);
    //         var scrollPos = $(window).scrollTop();
    //         var sectionTop = section.offset().top;
    //         var sectionBottom = sectionTop + section.height();

    //         if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
    //             link.addClass('text-white');
    //             $('#home-link').removeClass('text-white');
    //         } else {
    //             link.removeClass('text-white');
    //         }
    //     }

    //     $(window).on('scroll', function() {
    //         checkVisibility('#about', '#about-link');
    //         checkVisibility('#services', '#services-link');
    //         checkVisibility('#latest', '#latest-link');
    //         checkVisibility('#footer', '#footer-link');

    //         if (!$('#about-link').hasClass('text-white') && !$('#services-link').hasClass(
    //             'text-white')) {
    //             $('#home-link').addClass('text-white');
    //         }
    //     });
    // });

    // // Swipper Client
    // $(document).ready(function() {
    //     var swiperKlienKami = new Swiper('.swiper-klien-kami', {
    //         slidesPerView: 1,
    //         spaceBetween: 13,
    //         breakpoints: {
    //             640: {
    //                 slidesPerView: 2,
    //                 spaceBetween: 20,
    //             },
    //             768: {
    //                 slidesPerView: 3,
    //                 spaceBetween: 30,
    //             },
    //             1024: {
    //                 slidesPerView: 4,
    //                 spaceBetween: 40,
    //             },
    //         },
    //         pagination: {
    //             el: '.swiper-klien-kami .swiper-pagination',
    //             clickable: true,
    //         },
    //         navigation: {
    //             nextEl: '.swiper-klien-kami .swiper-button-next',
    //             prevEl: '.swiper-klien-kami .swiper-button-prev',
    //         },
    //         loop: true,
    //         autoplay: {
    //             delay: 3000, // Mengatur Delay Swipper
    //             disableOnInteraction: false, // Auto Slider ON/OFF
    //         },
    //     });
    // });


    // // Check password
    // function togglePasswordVisibility() {
    //     var passwordInput = document.getElementById("password");
    //     var currentType = passwordInput.getAttribute("type");

    //     if (currentType === "password") {
    //         passwordInput.setAttribute("type", "text");
    //     } else {
    //         passwordInput.setAttribute("type", "password");
    //     }
    // }

