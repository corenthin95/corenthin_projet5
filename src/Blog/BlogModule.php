<?php

namespace App\Blog;

use App\Blog\Actions\BlogAction;
use App\Router\Router;
use App\Models\Renderer\RendererInterface;
use App\Router\Module;

class BlogModule extends Module
{

    const DEFINITIONS = __DIR__ . '/config.php';

    public function __contruct(string $prefix, Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('blog', __DIR__ . '/views');
        $router->get($prefix, BlogAction::class, 'blog.index');
        $router->get($prefix . '/{slug:[a-z\-0-9]+}', BlogAction::class, 'blog.show');
    }
}