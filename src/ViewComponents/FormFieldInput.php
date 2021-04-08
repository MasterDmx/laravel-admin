<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;
use InvalidArgumentException;

class FormFieldInput extends Component
{
    /**
     * Формирует аттрибут name у input поля
     *
     * @var string
     */
    public $name;

    /**
     * Формирует аттрибут id у input поля
     *
     * @var string
     */
    public $id;

    /**
     * Формирует аттрибут value у input поля
     *
     * @var string
     */
    public $value;

    /**
     * Текст-подсказка, которая будет выведена после input поля
     *
     * @var string
     */
    public $help;

    public function __construct($name, $id = null, $value = '', $help = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->help = $help;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }

    public function render()
    {
        return view('admin::components.forms.fields.input');
    }
}
