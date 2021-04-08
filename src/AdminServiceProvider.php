<?php

namespace MasterDmx\Admin;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use MasterDmx\Admin\ViewComponents\FormBlock;
use MasterDmx\Admin\ViewComponents\Test;

class AdminServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        // Подключаем функции
        include substr(__DIR__, 0, -4) . DIRECTORY_SEPARATOR . 'functions.php';

        // Конфиг
        $this->publishes([
            __DIR__.'/../config/admin.php' => config_path('admin.php'),
        ]);

        // Public файлы
        $this->publishes([
            __DIR__.'/../public/css'        => public_path('assets/admin/css'),
            __DIR__.'/../public/img'        => public_path('assets/admin/img'),
            __DIR__.'/../public/js'         => public_path('assets/admin/js'),
            __DIR__.'/../public/media'      => public_path('assets/admin/media'),
            __DIR__.'/../public/webfonts'   => public_path('assets/admin/webfonts'),
        ], 'admin');

        // Resources файлы
        $this->publishes([
            __DIR__.'/../resources/sass'    => resource_path('sass/admin'),
            __DIR__.'/../resources/js'      => resource_path('js/admin'),
        ], 'admin');

        // Подгружаем вьюхи
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        // Подгружаем компоненты
        $this->loadViewComponentsAs('admin', config('admin.components'));
    }

    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/admin.php', 'admin');

        $this->app->singleton(Admin::class);
    }
}
