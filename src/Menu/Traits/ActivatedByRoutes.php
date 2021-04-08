<?php

namespace MasterDmx\Admin\Menu\Traits;

trait ActivatedByRoutes
{
    private array $activateByRoutes;

    public function setRoutesForActivate(array $routes): self
    {
        $this->activateByRoutes = $routes;

        return $this;
    }

    public function getRoutesForActivate(): ?array
    {
        return $this->activateByRoutes ?? null;
    }
}
