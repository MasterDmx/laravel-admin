<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class FormBlockTextarea extends Component
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
     * Кол-во вмещаемых строк по умолчанию
     *
     * @var string
     */
    public $rows;

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

    public function __construct($title, $name, $id = null, $value = '', $rows = 5, $help = '', $size = 'lg')
    {
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->rows = $rows;
        $this->help = $help;
        $this->size = $size;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }


    public function render()
    {
        return view('admin::components.forms.block.textarea');
    }
}
