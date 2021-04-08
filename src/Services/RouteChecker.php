<?php

namespace MasterDmx\Admin\Services;

use Illuminate\Support\Facades\Request;

class RouteChecker
{
    public function checkListByArray(array $routes): bool
    {
        foreach ($routes as $name) {
            if ($this->check($name)) {
                return true;
            }
        }

        return false;
    }

    public function check(string $name): bool
    {
        return Request::routeIs($name);
    }
}
