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

mix.js('resources/js/app.js', 'public/js')
   .copy('node_modules/mdbootstrap/css/bootstrap.css', 'public/css')
   .copy('node_modules/mdbootstrap/css/mdb.css', 'public/css')
   .copy('node_modules/mdbootstrap/js/jquery-3.3.1.min.js', 'public/js')
   .copy('node_modules/mdbootstrap/js/popper.min.js', 'public/js')
   .copy('node_modules/mdbootstrap/js/bootstrap.js', 'public/js')
   .copy('node_modules/mdbootstrap/js/mdb.min.js', 'public/js');
