<?php

namespace Tests\Framework\Modules;

use stdClass;

class ErroredModule 
{
    public function __construct(\App\Controllers\Router $router)
    {
        $router->get('/demo', function () {
            return new stdClass();
        }, 'demo');
    }
}