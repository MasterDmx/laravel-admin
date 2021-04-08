<?php

namespace MasterDmx\Admin\Menu\Traits;

trait HasIconClass
{
    private string $iconClass;

    public function setIconClass(string $class): self
    {
        $this->iconClass = $class;

        return $this;
    }

    public function getIconClass(): string
    {
        return $this->iconClass;
    }

    public function hasIconClass()
    {
        return isset($this->iconClass);
    }
}
