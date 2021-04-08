<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class FormBlockSwitch extends Component
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $value;

    /**
     * Лейбл
     *
     * @var string
     */
    public $label;

    /**
     * Активно
     *
     * @var bool
     */
    public $checked;

    /**
     * @var string
     */
    public $size;

    public function __construct($title, $name, $id = null, $value = '', string $label = '', ?bool $checked = false, $size = 'lg')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
        $this->size = $size;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }


    public function render()
    {
        return view('admin::components.forms.block.switch');
    }
}
