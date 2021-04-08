<?php

namespace MasterDmx\Admin\Menu;

use MasterDmx\Admin\Menu\Contracts\HasActiveRoutes;
use MasterDmx\Admin\Menu\Traits\ActivatedByRoutes;
use MasterDmx\Admin\Menu\Traits\HasIconClass;

class Link implements HasActiveRoutes
{
    use HasIconClass, ActivatedByRoutes;

    /**
     * @var string
     */
    private string $name;
    private string $url;

    /**
     * Links constructor.
     *
     * @param string $name
     */
    public function __construct(string $name, string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getActiveRoutes(): array
    {
        $result = [$this->getUrl()];

        foreach ($this->getRoutesForActivate() ?? [] as $item){
            $result[] = $item;
        }

        return $result;
    }
}
