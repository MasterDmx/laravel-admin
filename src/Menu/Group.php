<?php

namespace MasterDmx\Admin\Menu;

use MasterDmx\Admin\Menu\Contracts\HasActiveRoutes;
use MasterDmx\Admin\Menu\Traits\ActivatedByRoutes;
use MasterDmx\Admin\Menu\Traits\HasIconClass;

class Group implements HasActiveRoutes
{
    use HasIconClass, ActivatedByRoutes;

    private string $name;

    private Builder $menu;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function menu(callable $settings): self
    {
        $builder = new Builder();
        $settings($builder);
        $this->menu = $builder;

        return $this;
    }

    public function getActiveRoutes(): array
    {
        $result = [];

        foreach ($this->getRoutesForActivate() ?? [] as $item){
            $result[] = $item;
        }

        foreach ($this->getContent() as $item) {
            if ($item instanceof HasActiveRoutes){
                foreach ($item->getActiveRoutes() as $routes){
                    $result[] = $routes;
                }
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Builder
     */
    public function getMenu(): Builder
    {
        return $this->menu;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->menu->getContent();
    }
}
