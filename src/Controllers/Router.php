<?php

namespace App\Controllers;

use App\Controllers\Router\Route;
use Mezzio\Router\FastRouteRouter;
use Psr\Http\Message\ServerRequestInterface;
use Mezzio\Router\FastRouteRouter as MezzioRouter;


class Router {

    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    public function get(string $path, callable $callable, string $name)
    {
        $this->router->addRoute(new MezzioRouter($path, $callable, ['GET'], $name));
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