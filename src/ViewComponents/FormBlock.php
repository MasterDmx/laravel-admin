<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;
use InvalidArgumentException;

class FormBlock extends Component
{
    /**
     * Заголовок блока
     *
     * @var string
     */
    public $title;

    /**
     * Размер блока
     *
     * @var string
     */
    public $size;

    /**
     * Аттрибут for у лэйбла
     *
     * @var string
     */
    public $for;

    /**
     * Выровнять контент и заголовок в одну линию
     *
     * @var string
     */
    public $alignCenter;

    protected $labalColSizes = [
        'xxs' => 'col-4 col-sm-4 col-md-3',
        'xs' => 'col-4 col-sm-4 col-md-3',
        'sm' => 'col-4 col-sm-4 col-md-3',
        'md' => 'col-sm-4 col-md-3',
        'lg' => 'col-sm-4 col-md-3',
        'xl' => 'col-md-3',
    ];
    protected $contentColSizes = [
        'xxs' => 'col-8 col-sm-4 col-md-3 col-lg-3 col-xl-2',
        'xs' => 'col-8 col-sm-4 col-md-3 col-lg-3 col-xl-2',
        'sm' => 'col-8 col-sm-4 col-md-3 col-lg-3 col-xl-2',
        'md' => 'col-sm-8 col-md-4 col-xl-3',
        'lg' => 'col-sm-8 col-md-9 col-xl-6',
        'xl' => 'col-md-9 col-xl-9',
    ];

    public function __construct($title, $size = 'lg', $for = '', $alignCenter = false)
    {
        $this->title = $title;
        $this->size = $size;
        $this->for = $for;
        $this->alignCenter = $alignCenter;

        if (!isset($this->labalColSizes[$size]) && !isset($this->contentColSizes[$size])) {
            throw new InvalidArgumentException('Undefined size ' . $this->size);
        }
    }

    public function getLabelCol(): string
    {
        return $this->labalColSizes[$this->size];
    }

    public function getContentCol(): string
    {
        return $this->contentColSizes[$this->size];
    }

    public function render()
    {
        return view('admin::components.forms.block');
    }
}
