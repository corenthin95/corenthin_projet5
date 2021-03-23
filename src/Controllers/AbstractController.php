<?php

namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

abstract class AbstractController
{
    protected $twig;

    public function __construct()
    {
        $this->configureTwig();
    }

    private function  configureTwig()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        if (!$this->twig instanceof Environment) {
            $this->twig = new Environment($loader);
        }
    }

    protected function render(string $template, array $options = [])
    {
        return $this->twig->render($template, $options);
    }
}