<?php

namespace MasterDmx\Admin\Menu;

abstract class Menu
{
    private Builder $menu;

    public function __construct()
    {
        $this->content($this->menu = new Builder());
    }

    abstract function content(Builder $menu): void;

    public function __toString()
    {
        return 'Опаньки';
    }

    protected function templateLink()
    {
        return 'admin::elements.menu.link';
    }

    protected function templateGroup()
    {
        return 'admin::elements.menu.group';
    }

    protected function templateTitle()
    {
        return 'admin::elements.menu.title';
    }

    public function render()
    {
        return new Render(
            $this->menu,
            $this->templateLink(),
            $this->templateGroup(),
            $this->templateTitle()
        );
    }


}
