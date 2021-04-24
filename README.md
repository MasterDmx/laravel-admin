###Данный плагин представляет из себя набор стилей и помошников для моей собственной реализации админ-панели. Он бесполезен для Вас.
This plugin is a set of styles and helpers for my admin panel implementation. It is useless to you.


#Установка
>composer require masterdmx/laravel-admin

#### Подключение провайдера в config app.php
> 'providers' => [
> 
>       MasterDmx\Admin\AdminServiceProvider::class,
> ]

####Публикация ресурсов
>php artisan vendor:publish --provider="MasterDmx\Admin\AdminServiceProvider" --tag="resources"

####Публикация конфига

>php artisan vendor:publish --provider="MasterDmx\Admin\AdminServiceProvider" --tag="config"

По желанию
