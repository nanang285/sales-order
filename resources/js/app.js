import "./bootstrap";
import "../css/app.css";
import "flowbite";
import { DataTable } from "simple-datatables";

document.addEventListener("DOMContentLoaded", function() {
    const table = document.querySelector("#pagination-table");
    const dataTable = new DataTable(table, {
        "scrollX": true,
        paging: true, // enable or disable pagination
        perPage: 10, // set the number of rows per page
        perPageSelect: [10], // set the number of rows per page options
        });
});


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
    const text = "Selamat Datang Di Halaman Dashboard Zen Multimedia.";
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




// WYSIWYG PLUGIN DEFINITION
import { Editor } from 'https://esm.sh/@tiptap/core@2.6.6';
import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.6.6';
import Highlight from 'https://esm.sh/@tiptap/extension-highlight@2.6.6';
import Underline from 'https://esm.sh/@tiptap/extension-underline@2.6.6';
import Link from 'https://esm.sh/@tiptap/extension-link@2.6.6';
import TextAlign from 'https://esm.sh/@tiptap/extension-text-align@2.6.6';
import HorizontalRule from 'https://esm.sh/@tiptap/extension-horizontal-rule@2.6.6';
import Image from 'https://esm.sh/@tiptap/extension-image@2.6.6';
import YouTube from 'https://esm.sh/@tiptap/extension-youtube@2.6.6';
import TextStyle from 'https://esm.sh/@tiptap/extension-text-style@2.6.6';
import FontFamily from 'https://esm.sh/@tiptap/extension-font-family@2.6.6';
import { Color } from 'https://esm.sh/@tiptap/extension-color@2.6.6';

window.addEventListener('load', function() {
    if (document.getElementById("wysiwyg-example")) {

    const FontSizeTextStyle = TextStyle.extend({
        addAttributes() {
            return {
            fontSize: {
                default: null,
                parseHTML: element => element.style.fontSize,
                renderHTML: attributes => {
                if (!attributes.fontSize) {
                    return {};
                }
                return { style: 'font-size: ' + attributes.fontSize };
                },
            },
            };
        },
    });

    // tip tap editor setup
    const editor = new Editor({
        element: document.querySelector('#wysiwyg-example'),
        extensions: [
            StarterKit,
            Highlight,
            Underline,
            Link.configure({
                openOnClick: false,
                autolink: true,
                defaultProtocol: 'https',
            }),
            TextAlign.configure({
                types: ['heading', 'paragraph'],
            }),
            HorizontalRule,
            Image,
            YouTube,
            TextStyle,
            FontSizeTextStyle,
            Color,
            FontFamily
        ],
        content: '',
        editorProps: {
            attributes: {
                class: 'format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none',
            },
        }
    });

    // set up custom event listeners for the buttons
    document.getElementById('toggleBoldButton').addEventListener('click', () => editor.chain().focus().toggleBold().run());
    document.getElementById('toggleItalicButton').addEventListener('click', () => editor.chain().focus().toggleItalic().run());
    document.getElementById('toggleUnderlineButton').addEventListener('click', () => editor.chain().focus().toggleUnderline().run());
    document.getElementById('toggleStrikeButton').addEventListener('click', () => editor.chain().focus().toggleStrike().run());
    document.getElementById('toggleHighlightButton').addEventListener('click', () => editor.chain().focus().toggleHighlight({ color: '#ffc078' }).run());
    document.getElementById('toggleLinkButton').addEventListener('click', () => {
        const url = window.prompt('Enter image URL:', 'https://flowbite.com');
        editor.chain().focus().toggleLink({ href: url }).run();
    });
    document.getElementById('removeLinkButton').addEventListener('click', () => {
        editor.chain().focus().unsetLink().run()
    });
    document.getElementById('toggleCodeButton').addEventListener('click', () => {
        editor.chain().focus().toggleCode().run();
    })

    document.getElementById('toggleLeftAlignButton').addEventListener('click', () => {
        editor.chain().focus().setTextAlign('left').run();
    });
    document.getElementById('toggleCenterAlignButton').addEventListener('click', () => {
        editor.chain().focus().setTextAlign('center').run();
    });
    document.getElementById('toggleRightAlignButton').addEventListener('click', () => {
        editor.chain().focus().setTextAlign('right').run();
    });
    document.getElementById('toggleListButton').addEventListener('click', () => {
       editor.chain().focus().toggleBulletList().run();
    });
    document.getElementById('toggleOrderedListButton').addEventListener('click', () => {
        editor.chain().focus().toggleOrderedList().run();
    });
    document.getElementById('toggleBlockquoteButton').addEventListener('click', () => {
        editor.chain().focus().toggleBlockquote().run();
    });
    document.getElementById('toggleHRButton').addEventListener('click', () => {
        editor.chain().focus().setHorizontalRule().run();
    });
    document.getElementById('addImageButton').addEventListener('click', () => {
        const url = window.prompt('Enter image URL:', 'https://placehold.co/600x400');
        if (url) {
            editor.chain().focus().setImage({ src: url }).run();
        }
    });
    document.getElementById('addVideoButton').addEventListener('click', () => {
        const url = window.prompt('Enter YouTube URL:', 'https://www.youtube.com/watch?v=KaLxCiilHns');
        if (url) {
            editor.commands.setYoutubeVideo({
                src: url,
                width: 640,
                height: 480,
            })
        }
    });

    // typography dropdown
    const typographyDropdown = FlowbiteInstances.getInstance('Dropdown', 'typographyDropdown');

    document.getElementById('toggleParagraphButton').addEventListener('click', () => {
        editor.chain().focus().setParagraph().run();
        typographyDropdown.hide();
    });
    
    document.querySelectorAll('[data-heading-level]').forEach((button) => {
        button.addEventListener('click', () => {
            const level = button.getAttribute('data-heading-level');
            editor.chain().focus().toggleHeading({ level: parseInt(level) }).run()
            typographyDropdown.hide();
        });
    });

    const textSizeDropdown = FlowbiteInstances.getInstance('Dropdown', 'textSizeDropdown');

    // Loop through all elements with the data-text-size attribute
    document.querySelectorAll('[data-text-size]').forEach((button) => {
        button.addEventListener('click', () => {
            const fontSize = button.getAttribute('data-text-size');

            // Apply the selected font size via pixels using the TipTap editor chain
            editor.chain().focus().setMark('textStyle', { fontSize }).run();

            // Hide the dropdown after selection
            textSizeDropdown.hide();
        });
    });

    // Listen for color picker changes
    const colorPicker = document.getElementById('color');
    colorPicker.addEventListener('input', (event) => {
        const selectedColor = event.target.value;

        // Apply the selected color to the selected text
        editor.chain().focus().setColor(selectedColor).run();
    })

    document.querySelectorAll('[data-hex-color]').forEach((button) => {
        button.addEventListener('click', () => {
            const selectedColor = button.getAttribute('data-hex-color');

            // Apply the selected color to the selected text
            editor.chain().focus().setColor(selectedColor).run();
        });
    });

    document.getElementById('reset-color').addEventListener('click', () => {
        editor.commands.unsetColor();
    })

    const fontFamilyDropdown = FlowbiteInstances.getInstance('Dropdown', 'fontFamilyDropdown');

    // Loop through all elements with the data-font-family attribute
    document.querySelectorAll('[data-font-family]').forEach((button) => {
        button.addEventListener('click', () => {
            const fontFamily = button.getAttribute('data-font-family');

            // Apply the selected font size via pixels using the TipTap editor chain
            editor.chain().focus().setFontFamily(fontFamily).run();

            // Hide the dropdown after selection
            fontFamilyDropdown.hide();
        });
    });
}
})
