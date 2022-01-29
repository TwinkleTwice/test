const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.browserSync('checks.test');

mix.js('resources/js/script.js', 'public/js')
    .postCss('resources/css/tailwind.css', 'public/css', [
        tailwindcss('tailwind.config.js')
    ])
    .sass('resources/sass/style.scss', 'public/css', )
    .options({
        processCssUrls: false
    })
    .version();
