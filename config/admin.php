<?php

return [

    // Меню
    'menu' => \App\Admin\Menu::class,

    // Компоненты
    'components' => [

        // Основные компоненты
        \MasterDmx\Admin\ViewComponents\Panel::class,
        \MasterDmx\Admin\ViewComponents\Form::class,
        \MasterDmx\Admin\ViewComponents\FormPanel::class,

        // Горизонтальные блоки полей формы
        \MasterDmx\Admin\ViewComponents\FormBlock::class,
        \MasterDmx\Admin\ViewComponents\FormBlockInput::class,
        \MasterDmx\Admin\ViewComponents\FormBlockSwitch::class,
        \MasterDmx\Admin\ViewComponents\FormBlockSelect2::class,
        \MasterDmx\Admin\ViewComponents\FormBlockTextarea::class,

        // Поля формы
        \MasterDmx\Admin\ViewComponents\FormFieldSwitch::class,
        \MasterDmx\Admin\ViewComponents\FormFieldInput::class,
        \MasterDmx\Admin\ViewComponents\FormFieldSelect2::class,
        \MasterDmx\Admin\ViewComponents\FormFieldTextarea::class,

        // Допы
        \MasterDmx\Admin\ViewComponents\ExtraFormBlockMarkitup::class,
        \MasterDmx\Admin\ViewComponents\ExtraFormFieldMarkitup::class,
        \MasterDmx\Admin\ViewComponents\FormBlockTinyMce::class,
        \MasterDmx\Admin\ViewComponents\FormFieldTinyMce::class,
    ],
];
