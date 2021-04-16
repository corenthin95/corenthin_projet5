<?php

namespace Tests\Framework\Modules;

class ErroredModule 
{
    public function __construct(\App\Router\Router $router)
    {
        $router->get('/demo', function () {
            return 'DEMO';
        }, 'demo');
    }
}