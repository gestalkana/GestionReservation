import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'violet-dark': '#4b367c',
                'violet-navbar': '#543c88', 
                'violet-darker': '#2a1d47',
                'violet-light': '#b49bff',
                'violet-text': '#e0d8f7',
                'blanc-matte': '#f8f6fc', // blanc mat légèrement violet
                'violet-gray-dark': '#2e2a3b', // violet/gris foncé pour texte
            },
            keyframes: {
                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
            },
            animation: {
                'fade-in': 'fade-in 0.5s ease-out forwards',
            },
        },
    },

    plugins: [forms],
};
