<?php

namespace App\Models\Renderer;

use App\Router\RouterTwigExtension;
use Psr\Container\ContainerInterface;

class TwigRendererFactory
{
    public function __invoke(ContainerInterface $container): TwigRenderer
    {
        $viewPath = $container->get('views.path');
        $loader = new \Twig\Loader\FilesystemLoader($viewPath);
        $twig = new \Twig\Environment($loader);
        if ($container->has('twig.extension')) {
            foreach ($container->get('twig.extension') as $extension) {
                $twig->addExtension($extension);
            }
        }
        return new TwigRenderer($loader, $twig);
    }
}