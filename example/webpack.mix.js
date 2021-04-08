const mix = require('laravel-mix');

// -------------------------------------------------------------
// Admin
// -------------------------------------------------------------

// Compiled JS
mix.js('resources/js/admin/compiled.js', 'public/assets/admin/js').version().vue();

// SASS - Базовый стиль
mix.sass('resources/sass/admin/app.scss', 'public/assets/admin/css').options({
    processCssUrls: mix.inProduction()
});

// SASS - Стили цветовых тем
let i = 1;
while (i < 15) {
    mix.sass('resources/sass/admin/themes/cust-theme-' + i + '.scss',  'public/assets/admin/css/themes').options({
        processCssUrls: mix.inProduction()
    });

    i++;
}

// SASS - Тематические режимы
mix.sass('resources/sass/admin/app.skins.scss', 'public/assets/admin/css').options({
    processCssUrls: mix.inProduction()
});
