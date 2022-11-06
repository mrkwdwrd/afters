const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
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

var spinner = ora('Building admin assets...')
spinner.start()

// Admin assets build
mix.js('resources/js/admin/app.js', 'public/js/admin')
    .extract(['jquery', 'jquery-ui', 'lodash', 'axios', 'svg.js', 'selectize', 'jquery-validation', 'slick-carousel', 'sweetalert2', 'spectrum-colorpicker'], 'public/js/admin/vendor.js')
    .sass('resources/sass/admin/vendor.scss', 'public/css/admin')
    .sass('resources/sass/admin/app.scss', 'public/css/admin')
    .mjml('resources/views/emails/mjml/*.mjml', 'resources/views/emails')
    .copy('node_modules/font-awesome/fonts', 'public/css/fonts')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .sourceMaps()
    .mergeManifest()
    .then(function() {
        spinner.stop()
    });

if (mix.inProduction()) {
    mix.version();
}
