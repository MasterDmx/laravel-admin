const mix = require('laravel-mix');

const sassOptions = {
    processCssUrls: mix.inProduction()
};

// -------------------------------------------------------------
// Admin
// -------------------------------------------------------------

// SASS

// Базовый стиль
mix.sass('resources/sass/admin/app.scss', 'public/assets/admin/css').options(sassOptions);

// Стили цветовых тем
let i = 1;
while (i < 15) {
    mix.sass('resources/sass/admin/themes/cust-theme-' + i + '.scss',  'public/assets/admin/css/themes').options(sassOptions);
    i++;
}

// Тематические режимы
mix.sass('resources/sass/admin/app.skins.scss', 'public/assets/admin/css').options(sassOptions);

// Модуль Модальных окон VUE
mix.sass('resources/sass/admin/modules/vue-js-modal.scss', 'public/assets/admin/css/modules').options(sassOptions);

// Модуль BB редактора
// mix.sass('resources/sass/admin/modules/markitup/markitup.scss', 'public/assets/admin/css/modules').options(sassOptions);

// js

// Compiled JS
// mix.js('resources/js/admin/compiled.js', 'public/assets/admin/js').vue();
