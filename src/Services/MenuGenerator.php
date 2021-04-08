<?php

namespace MasterDmx\Admin\Services;

class MenuGenerator
{
    /**
     * Постфиксы CRUD роутов
     */
    private $crudPostfixes = ['create', 'store', 'edit', 'update'];

    private RouteChecker $routeChecker;

    public function __construct(RouteChecker $routeChecker) {
        $this->routeChecker = $routeChecker;
    }

    public function generate(array $items): string
    {
        $content = $this->buildContent($items);
        $html = '';

        foreach ($content as $item) {
            $html .= (string)$item['html'];
        }

        return $html;
    }

    /**
     * Определяет метод-обработчик в зависимости от указанного типа в конфиге
     */
    private function resolve(array $item)
    {
        $handler = 'buildLink';

        if ($item['type'] === 'group') {
            $handler = 'buildGroup';
        } elseif ($item['type'] === 'title') {
            $handler = 'buildTitle';
        }

        return $this->$handler($item);
    }

    // ---------------------------------------------------------------------
    // Билдеры
    // ---------------------------------------------------------------------

    private function buildContent(array $items)
    {
        foreach ($items as $item) {
            $content[] = $this->resolve($item);
        }

        return $content ?? [];
    }

    private function buildGroup (array $item)
    {
        $result = [];
        $contentElements = $this->buildContent($item['content']);
        $content = '';

        foreach ($contentElements as $contentResult) {
            if (isset($contentResult['routes']) && !in_array($contentResult['routes'], $result['routes'] ?? [])) {
                if (isset($result['routes'])) {
                    $result['routes'] = array_merge($result['routes'], $contentResult['routes']);
                } else {
                    $result['routes'] = $contentResult['routes'];
                }
            }

            $content .= $contentResult['html'];
        }

        if (isset($result['routes'])) {
            $isActive = $this->routeChecker->checkListByArray($result['routes']);
        }

        if (isset($item['active_routes'])) {
            $item['active_routes'] = $this->parseRoutes($item['active_routes']);

            if (!($isActive ?? false)) {
                $isActive = $this->routeChecker->checkListByArray($item['active_routes']);
            }

            if (isset($result['routes'])) {
                $result['routes'] = array_merge($result['routes'], $item['active_routes']);
            } else {
                $result['routes'] = $item['active_routes'];
            }
        }

        if (isset($item['active_routes']) && !($isActive ?? false)) {
            $isActive = $this->routeChecker->checkListByArray($item['active_routes']);
        }

        $result['html'] = view('admin::elements.menu.group', [
            'isActive' => $isActive ?? false,
            'name' => $item['name'] ?? null,
            'icon' => $item['icon'] ?? null,
            'content' => $content,
        ]);

        return $result;
    }

    private function buildLink(array $item)
    {
        if (isset($item['route'])) {
            $result['routes'][] = $item['route'];
            $url = route($item['route']);
            $isActive = $this->routeChecker->check($item['route']);
        }

        if (isset($item['active_routes'])) {
            $item['active_routes'] = $this->parseRoutes($item['active_routes']);

            if (!($isActive ?? false)) {
                $isActive = $this->routeChecker->checkListByArray($item['active_routes']);
            }

            if (isset($result['routes'])) {
                $result['routes'] = array_merge($result['routes'], $item['active_routes']);
            } else {
                $result['routes'] = $item['active_routes'];
            }
        }

        $result['html'] = view('admin::elements.menu.link', [
            'isActive' => $isActive ?? false,
            'name'     => $item['name'] ?? null,
            'icon' => $item['icon'] ?? null,
            'url'      => $url ?? null,
        ]);

        return $result;
    }

    private function buildTitle(array $item)
    {
        $result['html'] = view('admin::elements.menu.title', [
            'name' => $item['name'] ?? null,
        ]);

        return $result;
    }

    // ---------------------------------------------------------------------
    // Прочее
    // ---------------------------------------------------------------------

    private function parseRoutes(array $routes): array
    {
        foreach ($routes as $key => $name) {
            if (str_contains ($name, 'RESOURCE::')) {
                $base = substr($name, 10);
                $newRoutes = [];

                foreach ($this->crudPostfixes as $postfix) {
                    $newRoutes[] = $base . '.' . $postfix;
                }

                unset($routes[$key]);

                $routes = array_merge($routes, $newRoutes);
            }
        }

        return $routes;
    }
}
