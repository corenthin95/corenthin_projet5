<?php

namespace App\Router;

class Route {

    private $name;

    private $callback;

    private $parameters;

    /**
     * Route constructor
     * @param string $name
     * @param string|callable $callback
     * @param array $parameters
     */
    public function __construct(string $name, $callback, array $parameters)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|callable
     */

    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Retrieve the URL parameters
     * @return string[]
     */

    public function getParams(): array
    {
        return $this->parameters;
    }
}

