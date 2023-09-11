const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');


/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
         "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                'weirdo-red': {
                    '900': '#ec0c0c',
                },
                'weirdo-gray': {
                    '400': '#b1b2b6',
                    '700': '#402b33',
                    '900': '#1a2226',
                }
            },
            fontFamily: {
                'sans': ['Roboto'],
                'mont': ['Montserrat'],
                'ubuntu': ['Ubuntu', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
