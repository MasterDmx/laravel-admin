<?php

namespace MasterDmx\Admin;

use Illuminate\Support\Facades\Request;
use MasterDmx\Admin\Menu\Builder as MenuBuilder;
use MasterDmx\Admin\Services\MenuGenerator;

class Admin
{
    public function isRoutes(...$routes): bool
    {
        foreach ($routes as $routeName) {
            if (Request::routeIs($routeName)) {
                return true;
            }
        }

        return false;
    }

    public function menu(string $alias = 'default')
    {
        if ($handler = config('admin.menu.' . $alias)) {
            if (class_exists($handler)) {
                return (new $handler)->render();
            }
        }

        return null;
    }
}
