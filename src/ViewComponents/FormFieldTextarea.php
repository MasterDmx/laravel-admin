<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class FormFieldTextarea extends Component
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

    public function __construct($name, $id = null, $value = '', $rows = '', $help = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->rows = $rows;
        $this->help = $help;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }

    public function render()
    {
        return view('admin::components.forms.fields.textarea');
    }
}
