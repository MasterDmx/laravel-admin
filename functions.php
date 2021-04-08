<?php

use MasterDmx\Admin\Admin;

if (!function_exists('admin')) {

    function admin(): Admin
    {
        return app(Admin::class);
    }

}
