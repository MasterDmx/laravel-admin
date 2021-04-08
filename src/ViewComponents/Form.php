<?php

namespace MasterDmx\Admin\ViewComponents;

use Illuminate\View\Component;

class Form extends Component
{
    public $action = '';
    public $method = '';

    public function __construct($action = '', $method = 'post')
    {
        $this->action = $action;
        $this->method = trim($method);
    }

    public function getNativeMethod()
    {
        return strtolower($this->method) === 'get' ? 'GET' : 'POST';
    }

    public function getExtendedMethod()
    {
        return strtoupper($this->method);
    }

    public function isExtendedMethod(): bool
    {
        return in_array(strtolower($this->method), ['patch', 'put']);
    }

    public function render()
    {
        return view('admin::components.forms.form');
    }
}
