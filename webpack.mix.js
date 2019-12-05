const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/vuejs')
    .js('resources/js/axios.js', 'public/js/vuejs')
    //.sass('resources/sass/app.scss', 'public/css')
    //.copy('node_modules/animate.css/animate.css','public/assets/dashboard/assets/css/plugins')
    .sourceMaps();
