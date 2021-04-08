<?php

namespace MasterDmx\Admin\Menu\Contracts;

interface HasActiveRoutes
{
    public function getActiveRoutes(): array;
}
