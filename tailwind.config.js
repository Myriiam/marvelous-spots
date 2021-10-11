const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'first': '#E60E64',
                'middle': '#F3353D',
                'last': '#FB4C26',
                'sun': '#F0DD30',
                'gray-darker': '#333333',
                'gray-dark': '#4F4F4F',
                'gray-light': '#C4C4C4',
                'gray-lighter': '#E5E5E5',
                'gold': 'EBC00D',
                'my-orange': '#333333',
                'my-orange-light': '#F58E2F',
            },
            backgroundImage: {
                'header-profile': "url('/imgages/images/header-profile.jpg')",
            },
            backdropBlur: {
                xs: '2px',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['active'],
            animation: ['motion-safe'],
            textColor: ['responsive', 'hover', 'focus','active'],
            backgroundColor: ['responsive', 'hover', 'focus','active']
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
