###Данный плагин представляет из себя набор стилей и помошников для моей собственной реализации админ-панели. Он бесполезен для Вас.
This plugin is a set of styles and helpers for my admin panel implementation. It is useless to you.


#Установка
```bash
composer require masterdmx/laravel-admin
```

#### Подключение провайдера в config app.php
```php
return [
    'providers' => [
        MasterDmx\Admin\AdminServiceProvider::class,
    ],
];
```

####Конфиг
```bash
php artisan vendor:publish --provider="MasterDmx\Admin\AdminServiceProvider" --tag="config"
```

####Публичные файлы
```bash
php artisan vendor:publish --provider="MasterDmx\Admin\AdminServiceProvider" --tag="public"
```



#Работа с ресурсами

####Публикация ресурсов
```bash
php artisan vendor:publish --provider="MasterDmx\Admin\AdminServiceProvider" --tag="resources"
```

####Настройка webpack.mix.js

```js
const adminOptions = {
    processCssUrls: false
}

// Base
mix.sass('resources/sass/admin/app.scss', 'public/assets/admin/css').options(adminOptions)

// Color themes
let i = 1
while (i < 15) {
    mix.sass('resources/sass/admin/themes/cust-theme-' + i + '.scss',  'public/assets/admin/css/themes').options(adminOptions)
    i++
}

// Skins
mix.sass('resources/sass/admin/app.skins.scss', 'public/assets/admin/css').options(adminOptions);

// Tiny MCE
mix.sass('resources/sass/admin/modules/tinymce.scss', 'public/assets/admin/css/modules').options(adminOptions);
```




#Главное меню

#### Настройка конфига admin.php
```php
return [
    'menu' => \App\Admin\Menu::class,
];
```

#### Настройка класса Menu
```php
namespace App\Admin;

use MasterDmx\Admin\Menu\Builder;
use MasterDmx\Admin\Menu\Menu as AdminMenu;

class Menu extends AdminMenu
{
    public function content(Builder $menu): void
    {
        $menu->addLink('Главная', route('admin.dashboard'))->setIconClass('fal fa-window');

        if (auth()->user()->can('view_articles')) {
            $menu->addGroup('Статьи')->setIconClass('fal fa-books')->menu(function (Builder $menu) {
                $menu->addLink('Статьи', route('admin.articles.index'))->setRoutesForActivate(['admin.articles.create', 'admin.articles.store', 'admin.articles.edit', 'admin.articles.update']);
                $menu->addLink('Категории', route('admin.articles.categories.index'))->setRoutesForActivate(['admin.articles.categories.create', 'admin.articles.categories.store', 'admin.articles.categories.edit', 'admin.articles.categories.update']);
            });
        }
    }
}
```




