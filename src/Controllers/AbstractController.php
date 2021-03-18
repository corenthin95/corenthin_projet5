<?php

namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environnement;

abstract class AbstractController
{
    protected $twig;

    public function __construct()
    {
        $this->configureTwig();
    }

    private function  configureTwig()
    {
        $loader = new FilesystemLoader(__DIR__.'/../../templates');
        if (!$this->twig instanceof Environnement) {
            $this->twig = new Environnement($loader);
        }
    }

    protected function render(string $template, array $options = [])
    {
        return $this->twig->render($template, $options);
    }
}