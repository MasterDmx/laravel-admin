<?php

namespace MasterDmx\Admin\Menu;

class Builder
{
    private array $content;

    public function addGroup($name): Group
    {
        return $this->content[] = new Group($name);
    }

    public function addLink(string $name, string $url): Link
    {
        return $this->content[] = new Link($name, $url);
    }

    public function getContent(): array
    {
        return $this->content ?? [];
    }
}
