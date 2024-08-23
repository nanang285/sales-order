import "./bootstrap";
import "../css/app.css";
import "flowbite";

$(document).ready(function () {
    var animationDuration = 400;

    $(".navbar-burger").on("click", function () {
        $(".navbar-menu").slideToggle(animationDuration);
    });

    $(window).on("resize", function () {
        $(".navbar-menu").slideUp(animationDuration);
    });
});

$(window).on("resize", function () {
    var width = $(window).width();
    if (width >= 1024) {
        $("#sidebar").show();
    } else {
        $("#sidebar").hide();
    }
});

$(document).ready(function () {
    function checkVisibility(sectionId, linkId) {
        var section = $(sectionId);
        var link = $(linkId);
        var scrollPos = $(window).scrollTop();
        var sectionTop = section.offset();
        var sectionBottom = sectionTop + section.height();

        if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
            link.addClass("text-white shadow-sm");
            $("#home-link").removeClass("text-white");
        } else {
            link.removeClass("text-white shadow-sm");
        }
    }
});

$(document).ready(function () {
    var swiperLatestProject = new Swiper(".swiper-latest-project", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            1024: {
                slidesPerView: 1.7,
                spaceBetween: 45,
            },
        },
        navigation: {
            nextEl: ".swiper-latest-project .button-prev",
        },
        loop: true,
    });

    $(".button-next").on("click", function () {
        swiperLatestProject.slideNext();
    });
});

$(window).on("load", function () {
    setTimeout(function () {
        $("#preloader").fadeOut();
    }, 300);
});

$(document).ready(function () {
    $("#togglePassword").on("click", function () {
        var passwordInput = $("#password");
        var icon = $(this).find("i");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
});

// Disable Inspect pages
$(document).ready(function () {
    $(document).on("contextmenu", function (e) {
        return false;
    });
});

$(document).ready(function () {
    $(document).keydown(function (e) {
        // F12
        if (e.keyCode == 123) {
            return false;
        }
        // Ctrl+Shift+I
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            return false;
        }
        // Ctrl+Shift+C
        if (e.ctrlKey && e.shiftKey && e.keyCode == 67) {
            return false;
        }
    });

    $(document).keydown(function (e) {
        // Ctrl+U (View Page Source)
        if (e.ctrlKey && e.keyCode == 85) {
            return false;
        }
        // Ctrl+Shift+J (Console)
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
    });
});

$(document).ready(function () {
    const $navbar = $("#navbar");
    const $shadowSection = $("#shadow");

    function checkScroll() {
        const shadowSectionTop =
            $shadowSection.offset().top - $(window).scrollTop();
        if (shadowSectionTop <= 50) {
            $navbar.addClass("backdrop-blur-md bg-primary/50");
        } else {
            $navbar.removeClass("backdrop-blur-md bg-primary/50");
        }
    }

    $(window).on("scroll", checkScroll);
    checkScroll();
});

$(document).ready(function () {
    const $toggleButton = $("#toggleSidebarMobile");
    const $sidebar = $("#sidebar");
    const $hamburgerIcon = $("#toggleSidebarMobileHamburger");
    const $closeIcon = $("#toggleSidebarMobileClose");

    $toggleButton.on("click", function () {
        $sidebar.toggleClass("hidden");
        $hamburgerIcon.toggleClass("hidden");
        $closeIcon.toggleClass("hidden");
    });
});

$(document).ready(function () {
    const text = "Selamat datang di halaman dashboard Zen Multimedia.";
    const $welcomeMessage = $("#welcome-message");
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

    $passwordInput.attr(
        "type",
        currentType === "password" ? "text" : "password"
    );
}
