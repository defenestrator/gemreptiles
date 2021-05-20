const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                green: {
                    '50':  '#EEF3ED',
                    '100': '#D4E4D0',
                    '200': '#82AC77',
                    '300': '#ADCBA5',
                    '400': '#5C8B50',
                    '500': '#3b7d2b',
                    '600': '#3e6534',
                    '700': '#29571e',
                    '800': '#183f0d',
                    '900': '#0A2602',
                }
            },
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                serif: ['"Fauna One"', ...defaultTheme.fontFamily.serif]
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
