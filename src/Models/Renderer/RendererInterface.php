<?php

namespace App\Models\Renderer;

interface RendererInterface
{

    /**
     * Permit to add a path for your views
     * @param string $namespace
     * @param null|string $path
     */
    public function addPath(string $namespace, ?string $path = null): void;

    /**
     * Permit to render a view
     * The path can be specifed with namespaces added with addPath()
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string;

    /**
     * Permit to add variables for all views
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value): void;
}