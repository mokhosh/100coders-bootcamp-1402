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
                sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
                title: ['DM Serif Display'],
            },
            colors: {
                'primary': {
                    '50': '#faf6f2',
                    '100': '#f2eae2',
                    '200': '#e5d4c3',
                    '300': '#d4b79d',
                    '400': '#c9a185',
                    '500': '#b57b5a',
                    '600': '#a86a4e',
                    '700': '#8c5542',
                    '800': '#71463b',
                    '900': '#5c3b32',
                    '950': '#311d19',
                },
                'secondary': {
                    '50': '#f7f7f7',
                    '100': '#ececed',
                    '200': '#dddfe0',
                    '300': '#cdcfd0',
                    '400': '#abaeaf',
                    '500': '#95999c',
                    '600': '#85888b',
                    '700': '#777a7e',
                    '800': '#646669',
                    '900': '#525456',
                    '950': '#353536',
                },
                'brown': {
                    '50': '#fbf7f1',
                    '100': '#f6ebde',
                    '200': '#ecd4bc',
                    '300': '#dfb792',
                    '400': '#d19163',
                    '500': '#c87847',
                    '600': '#ba633c',
                    '700': '#9b4e33',
                    '800': '#7d402f',
                    '900': '#653629',
                    '950': '#361a14',
                },
                'accent': {
                    '50': '#f8f7f8',
                    '100': '#f0eef0',
                    '200': '#dddadd',
                    '300': '#bfbabf',
                    '400': '#9a959b',
                    '500': '#7e787f',
                    '600': '#6b656c',
                    '700': '#544f55',
                    '800': '#474448',
                    '900': '#3f3b3f',
                    '950': '#2a272a',
                },
            }
        },
    },

    plugins: [forms],
};
