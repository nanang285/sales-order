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
