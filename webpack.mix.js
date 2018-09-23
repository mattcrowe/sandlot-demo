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
        alias: {}
    }
});

mix.copy("node_modules/admin-lte", 'public/plugins/admin-lte', false);

mix.js('resources/js/admin.js', 'public/js').version();

mix.sass('resources/sass/admin.scss', 'public/css').version();
