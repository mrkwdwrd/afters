const mix = require('laravel-mix');
const ora = require('ora')
require('laravel-mix-merge-manifest');
require('laravel-mix-mjml');

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

var spinner = ora('Building client assets...')
spinner.start()


// Client assets build
mix.js('resources/js/app.js', 'public/js')
    .options({ processCssUrls: false })
    .extract(['jquery', 'lodash', 'axios', 'svg.js', 'selectize', 'jquery-validation', 'slick-carousel', 'sweetalert2'], 'public/js/vendor.js')
    .sass('resources/sass/vendor.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .mjml('resources/views/emails/mjml/*.mjml', 'resources/views/emails')
    .sourceMaps()
    .mergeManifest()
    .then(function() {
        spinner.stop()
    });


if (mix.inProduction()) {
    mix.version();
}
