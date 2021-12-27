const mix = require('laravel-mix');
var path = require('path');
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

mix
/* CSS */
// .sass('resources/sass/main.scss', 'public/css/oneui.css')
// .sass('resources/sass/oneui/themes/amethyst.scss', 'public/css/themes/')
// .sass('resources/sass/oneui/themes/city.scss', 'public/css/themes/')
// .sass('resources/sass/oneui/themes/flat.scss', 'public/css/themes/')
// .sass('resources/sass/oneui/themes/modern.scss', 'public/css/themes/')
// .sass('resources/sass/oneui/themes/smooth.scss', 'public/css/themes/')
/* JS */
.js('resources/js/vendors.js', 'public')
.js('resources/js/frontsite/app.js', 'public')
.js('resources/js/admin/admin.js', 'public').vue()
.disableNotifications();
mix.webpackConfig({
    devtool:  "source-map",
    output: {
        filename: 'js/main[name].js',
        chunkFilename: 'js/chunks/[name].js',
    },
    module: {
        rules: [
            {},
        ]
    },
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            '~': path.join(__dirname, './resources/js')
        }
    },
    plugins: [
        // new Dotenv()
    ]
})

/* Options */
.options({
    processCssUrls: false
});
if (mix.inProduction()) {
    mix.options({
        terser: {
            terserOptions: {
                compress: {
                    drop_console: true
                }
            }
        }
    });
    mix.version();
}
