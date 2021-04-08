<?php

namespace MasterDmx\Admin\Menu;

use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver;

class Render
{
    private Builder $menu;
    private string $templateLink;
    private string $templateGroup;
    private string $templateTitle;

    public function __construct(Builder $menu, string $templateLink, string $templateGroup, string $templateTitle)
    {
        $this->menu = $menu;
        $this->templateLink = $templateLink;
        $this->templateGroup = $templateGroup;
        $this->templateTitle = $templateTitle;
    }

    public function __toString(): string
    {
        return (string)$this->render();
    }

    public function render(): string
    {
        return $this->renderResolver($this->menu->getContent());
    }

    private function renderResolver(array $items): string
    {
        $content = '';

        foreach ($items as $item) {
            if ($item instanceof Link) {
                $content .= $this->renderLink($item);
            } elseif ($item instanceof Group){
                $content .= $this->renderGroup($item);
            }
        }

        return $content;
    }

    public function renderLink(Link $link)
    {
        return (string)view($this->templateLink, [
            'isActive' => $this->checkActiveRoutesByArray($link->getActiveRoutes()),
            'link' => $link
        ]);
    }

    public function renderGroup(Group $group)
    {
        $content = $this->renderResolver($group->getMenu()->getContent());

        return (string)view($this->templateGroup, [
            'isActive' => $this->checkActiveRoutesByArray($group->getActiveRoutes()),
            'content' => $content,
            'group' => $group
        ]);
    }

    private function checkActiveRoutesByArray(array $routes): bool
    {
        foreach ($routes as $name) {
            if ($this->checkActiveRoute($name)) {
                return true;
            }
        }

        return false;
    }

    private function checkActiveRoute(string $name): bool
    {
        if (Request::routeIs($name)) {
            return true;
        }

        if (Request::fullUrlIs($name)) {
            return true;
        }

        return false;
    }
}
