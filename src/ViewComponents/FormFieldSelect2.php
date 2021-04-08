<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use InvalidArgumentException;
use stdClass;

class FormFieldSelect2 extends Component
{
    const TEMPLATE = 'admin::components.forms.fields.select2';

    public $id;
    public $name;

    /**
     * Параметры
     *
     * @var array
     */
    public $options;

    /**
     * Драйвер работы со списком
     * * data (по умолчанию) - поиск по внутренним элементам массив \ коллекции (для указания ключей испрользуются optionKeyValue и optionKeyName)
     * * array - в качестве id и изначения будут использованы элементы массив
     * * assoc - *ключ - value, *значение - значение
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
        $name,
        $options        = null,
        $optionsDriver  = 'data',
        $optionKeyValue = 'id',
        $optionKeyName  = 'name',
        $selected       = null,
        $placeholder    = null,
        $multiple       = false,
        $search         = false,
        $defaultOption  = false,
        $id             = null
    ) {
        $this->options        = $this->processOptions($options);
        $this->optionsDriver  = $optionsDriver;
        $this->optionKeyValue = $optionKeyValue;
        $this->optionKeyName  = $optionKeyName;
        $this->selected       = $selected;
        $this->placeholder    = $placeholder;
        $this->multiple       = $multiple;
        $this->search         = $search;
        $this->defaultOption  = $defaultOption;
        $this->id             = $id;
        $this->name           = $name;


        if (!isset($this->id)) {
            $this->id = 'field-' . $this->name;
        }
    }

    /**
     * Проверка значения на активность
     */
    public function isSelected($search): bool
    {
        if (isset($this->selected)) {
            if (is_array($this->selected)) {
                return in_array($search, $this->selected);
            } elseif ((is_numeric($search) || is_string($search)) && $this->selected === $search) {
                return true;
            }
        }

        return false;
    }

    /**
     * Обработка данных списка
     *
     * @param string|int|null|array|Collection $options
     * @return array
     */
    public function processOptions($options)
    {
        if (empty($options)) {
            return [];
        }

        if (is_string($options) || is_numeric($options)) {
            return explode(',', $options);
        }

        if (is_array($options)) {
            return $options;
        }

        if (is_a($options, Collection::class)) {
            foreach ($options->toArray() as $key => $item) {
                if (is_a($item, stdClass::class)) {
                    $list[$key] = json_decode(json_encode($item), true);
                } else {
                    $list[$key] = $item;
                }
            }

            return $list ?? [];
        }

        throw new InvalidArgumentException('Undefined type selected');
    }

    /**
     * Получить список для формирования
     *
     * @return array
     */
    public function getOptions()
    {
        if (($this->optionsDriver ?? 'data') === 'data') {
            foreach ($this->options as $item) {
                $list[$item[$this->optionKeyValue ?? 'id']] = $item[$this->optionKeyName ?? 'name'];
            }

            return $list ?? [];
        } elseif ($this->optionsDriver === 'array') {
            foreach ($this->options as $item) {
                $list[$item] = $item;
            }

            return $list ?? [];
        }

        return $this->options;
    }

    public function render()
    {
        return view(static::TEMPLATE);
    }
}
