<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class FormBlockInput extends Component
{
    /**
     * Формирует заголовок блока с полем
     *
     * @var string
     */
    public $title;

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

    /**
     * Устанавливает размер блока с полем
     *
     * @var string
     */
    public $size;

    public function __construct($title, $name, $id = null, $value = '', $help = '', $size = 'lg')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->help = $help;
        $this->size = $size;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }


    public function render()
    {
        return view('admin::components.forms.block.input');
    }
}
