<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;
use InvalidArgumentException;

class Panel extends Component
{
    /**
     * @var string
     */
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('admin::components.panel');
    }
}
