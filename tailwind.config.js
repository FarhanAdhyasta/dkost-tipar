import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            colors: {
                hijautua: '#1A4D2E',
                hijaumuda: '#4F6F52',
                kremtua: '#E8DFCA',
                kremmuda: '#F5EFE6',
            },
            fontFamily: {
                sans: ['Poppins', 'sans-serif', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero': "url('/public/img/hero.jpg')",
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin')],
};
