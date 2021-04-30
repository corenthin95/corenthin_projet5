<?php

namespace App\Models\Renderer;
use Twig\Extra\String\StringExtension;


class TwigRenderer implements RendererInterface
{

    private $twig;

    private $loader;

    public function __construct(\Twig\Loader\FilesystemLoader $loader, \Twig\Environment $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
        //$this->twig->addExtension(new StringExtension());
    }
    /**
     * Permit to add a path for your views
     * @param string $namespace
     * @param null|string $path
     */
    public function addPath(string $namespace, ?string $path = null): void
    {
        $this->loader->addPath($path, $namespace);
    }

    /**
     * Permit to render a view
     * The path can be specifed with namespaces added with addPath()
     * $this->render('@blog/view');
     * $this->render('view');
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string
    {
        return $this->twig->render($view . '.twig', $params);
    }

    /**
     * Permit to add variables for all views
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }

}
