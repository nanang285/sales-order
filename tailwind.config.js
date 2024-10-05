/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    plugins: [
        require('flowbite-typography'),
        require("flowbite/plugin")({
            datatables: true,
            // wysiwyg: true,
        }),
    ],

    theme: {
        extend: {
            fontFamily: {
                arial: ["Arial", "sans-serif"],
            },
            keyframes: {
                slideUp: {
                    "0%": { transform: "translateY(100%)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" },
                },
                wiggle: {
                    "0%, 100%": { transform: "rotate(-1.3deg)" },
                    "50%": { transform: "rotate(1.3deg)" },
                },
                'infinite-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                },
            },
            animation: {
                slideUp: "slideUp 0.5s ease-in-out forwards",
                wiggle: "wiggle 1s ease-in-out infinite",
                'infinite-scroll': 'infinite-scroll 40s linear infinite',
            },
            colors: {
                primary: {
                    light: "#1B2579",
                    DEFAULT: "#1B2579",
                    dark: "#1B2579",
                },
                skyblue: {
                    light: "#1b2479ad",
                    DEFAULT: "#1b2479ad",
                    dark: "#1b2479ad",
                },
                violet: {
                    light: "#7581E3",
                    DEFAULT: "#7581E3",
                    dark: "#7581E3",
                },
                lightblue: {
                    light: "#DBDFFE",
                    DEFAULT: "#DBDFFE",
                    dark: "#DBDFFE",
                },
            },
        },
    },
};
