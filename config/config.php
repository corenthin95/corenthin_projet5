<?php

use App\Models\Renderer\RendererInterface;
use App\Models\Renderer\TwigRendererFactory;
use App\Router\Router;
use App\Router\RouterTwigExtension;

return  [
    'views.path' => dirname(__DIR__) . '/views',
    'twig.extension' => [
        \DI\get(RouterTwigExtension::class)
    ],
    Router::class => DI\create(),
    RendererInterface::class => DI\factory(TwigRendererFactory::class)
]; 