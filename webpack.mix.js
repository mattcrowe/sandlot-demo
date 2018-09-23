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

mix.autoload({
    axios: ['axios'],
    jquery: ['jQuery', '$'],
    lodash: ['_'],
    vue: ['Vue']
});

mix.webpackConfig({
    resolve: {
        modules: [
            path.resolve(__dirname, 'resources'),
            'node_modules'
        ],
        alias: {
            // 'components': path.resolve(__dirname, './resources/assets/js/front/components'),
            // 'lib': path.resolve(__dirname, './resources/assets/js/front/lib'),
            // 'craa': path.resolve(__dirname, './resources/craa-shared/js/front'),
            // 'craa-shared-admin': path.resolve(__dirname, `./${craaShared}/js/admin`),
            // 'craa-shared': path.resolve(__dirname, `./${craaShared}/js/front`),
            // jquery: "jquery/src/jquery"
        }
    }
});

mix.copy("node_modules/admin-lte", 'public/plugins/admin-lte', false);

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
