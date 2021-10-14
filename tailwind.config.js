const defaultTheme = require('tailwindcss/defaultTheme');
const palette = require('./palette');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors:palette,
            fontFamily: {
                regular: ['WinstonRegular'],
                medium: ['WinstonMedium'],
                bold: ['WinstonBold'],
                black: ['WinstonBlack'],
                sans: ['Nunito', 'Winston', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

