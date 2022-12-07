const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/assets/js')
    .js('resources/js/help-topic.js', 'public/assets/js')
    .js('resources/js/map.js', 'public/assets/js')
    .js('resources/js/home.js', 'public/assets/js')
    .js('resources/js/localize.js', 'public/assets/js')
    .js('resources/js/courses.js', 'public/assets/js')
    .sass('resources/sass/main.scss', 'public/assets/css')
    .copy('resources/images', 'public/assets/images')
    .version();
