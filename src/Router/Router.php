<?php

namespace App\Router;

use App\Router\Route;
use Mezzio\Router\FastRouteRouter;
use Psr\Http\Message\ServerRequestInterface;
use Mezzio\Router\Route as RouterRoute;

class Router {

    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    /**
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function get(string $path, $callable, string $name)
    {
        $this->router->addRoute(new RouterRoute($path, $callable, ['GET'], $name));
    }

    public function match(ServerRequestInterface $request): ?Route
    {
        $result = $this->router->match($request);
        if ($result->isSuccess()) {
            return new Route(
                $result->getMatchedRoute(),
                $result->getMatchedRouteName(),
                $result->getMatchedParams()
            );
        }

        return null;
        
    }

    public function generateUri(string $name, array $params): ?string
    {
        return $this->router->generateUri($name, $params);
    }
}