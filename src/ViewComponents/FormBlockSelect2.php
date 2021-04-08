<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class FormBlockSelect2 extends Component
{
    public $title;
    public $name;
    public $size;
    public $id;

    /**
     * Параметры
     *
     * @var array
     */
    public $options;

    /**
     * Драйвер работы со списком
     * * data (по умолчанию) - поиск по внутренним элементам массив \ коллекции (для указания ключей испрользуются optionKeyValue и optionKeyName)
     * * array - *ключ - value, *значение - значение
     *
     * @var string
     */
    public $optionsDriver;

    /**
     * Ключ внутреннего элемента массива для вставки в атрибут value
     *
     * @var string
     */
    public $optionKeyValue;

    /**
     * Ключ внутреннего элемента массива для вставки в тег option
     *
     * @var string
     */
    public $optionKeyName;

    /**
     * Активные элементы массива
     *
     * @var array
     */
    public $selected;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * Скрыть панель поиска
     *
     * @var boolean
     */
    public $search;

    /**
     * Дефолтный option с пустым value
     *
     * @var string
     */
    public $defaultOption;

    /**
     * @var bool
     */
    public $multiple;

    public function __construct(
        $title,
        $name,
        $size           = 'lg',
        $id             = null,
        $options        = null,
        $optionsDriver  = null,
        $optionKeyValue = null,
        $optionKeyName  = null,
        $selected       = null,
        $placeholder    = null,
        $multiple       = null,
        $search         = null,
        $defaultOption  = null
    ) {
        $this->title          = $title;
        $this->name           = $name;
        $this->size           = $size;
        $this->id             = $id;
        $this->options        = $options;
        $this->optionsDriver  = $optionsDriver;
        $this->optionKeyValue = $optionKeyValue;
        $this->optionKeyName  = $optionKeyName;
        $this->selected       = $selected;
        $this->placeholder    = $placeholder;
        $this->multiple       = $multiple;
        $this->search         = $search;
        $this->defaultOption  = $defaultOption;

        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }

    public function render()
    {
        return view('admin::components.forms.block.select2');
    }
}
