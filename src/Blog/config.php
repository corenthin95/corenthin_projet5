<?php

use App\Blog\BlogModule;
use function \DI\create;
use function \DI\get;

return [
    'blog.prefix' => '/blog',
    BlogModule::class => create()->constructor('prefix', get('blog.prefix'))
];