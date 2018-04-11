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
// .options({ processCssUrls: false })
.setPublicPath('../')
.scripts(['public/js/app.js','./node_modules/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js'],'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
