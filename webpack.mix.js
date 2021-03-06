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

mix.js('resources/js/*.js', 'public/js');

mix.sass('resources/scss/main.scss', 'public/css/app.css')
    .options({
        postCss: [tailwindcss('./tailwind.config.js')],
    })

mix.copy('resources/img', 'public/img')