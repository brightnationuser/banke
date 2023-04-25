let mix = require('laravel-mix');
const LiveReloadPlugin = require('webpack-livereload-plugin');
// Определяем важные пути
const resources_path = './wp-content/themes/classy/';

// Куда копировать ресурсы из CSS
mix.setPublicPath(resources_path + 'dist');

// Автоподмена пути к ресурсам в cSS
mix.setResourceRoot('/wp-content/themes/classy/dist');

// Для маски - @import "blocks/**/*.scss"
mix.webpackConfig((options) => {
    return {
        module: { rules: [ { test: /\.scss$/, loader: 'import-glob-loader' }, ] },
        plugins: [new LiveReloadPlugin()]
    }
});

mix.options({
    processCssUrls: false,
});

// JS
mix.js(resources_path + 'js/index.js', resources_path + 'dist').js(resources_path + 'js/landing.js', resources_path + 'dist').autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
})

// SASS
.sass(resources_path + 'sass/style.scss', resources_path + 'dist')
.sass(resources_path + 'sass/landing.scss', resources_path + 'dist')
.sass(resources_path + 'sass/admin/admin.scss', resources_path + 'dist')

// Generate sourceMaps
.sourceMaps(true,'source-map')

// Add hash version to file {{ mix('/css/app.css') }}
.version()

if (mix.inProduction()) {
    // mix.version();
}

// ================ Example =================

// Images - (already copied automatically from CSS)
// .copy(resources_path + 'images', resources_path + 'dist/images', false )

// Fonts - (already copied automatically from CSS)
//.copy(resources_path + 'fonts', resources_path + 'dist/fonts', false )


// .browserSync(
// {
//     files: ["public/**/*", "craft/config/**/*", "craft/templates/**/*"],
//     proxy: "https://sargentmetal.dev"
// }
