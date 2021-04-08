<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class FormFieldSwitch extends Component
{
    /**
     * Атрибут name
     *
     * @var string
     */
    public $name;

    /**
     * Значение при активации
     *
     * @var string|int|null
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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, $value = null, string $label = '', ?bool $checked = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin::components.forms.fields.switch');
    }
}
