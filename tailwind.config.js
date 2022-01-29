const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");
const colors = require("tailwindcss/colors");
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.scss',
        './resources/**/*.css',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('tailwindcss-plugins/pagination')
    ],
}
