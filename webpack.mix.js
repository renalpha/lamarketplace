let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/style.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css');

mix.copy('node_modules/font-awesome/fonts', 'public/fonts/vendor/font-awesome')
mix.copy('node_modules/bootstrap', 'public/site/bootstrap')
mix.copy('node_modules/jquery', 'public/jquery')
mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts/vendor/bootstrap-sass');

