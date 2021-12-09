<?php

namespace App\Routing;

use App\Application\Http\Parameter;
use App\Application\Http\ParametersBag;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    protected RouteCollection $routeCollection;

    public function __construct()
    {
        $this->initRoute();
    }

    public function match(ServerRequestInterface $request)
    {
        $context = new RequestContext();
        $context->setPathInfo($request->getUri()->getPath());
        $matcher = new UrlMatcher($this->routeCollection, $context);
        $parameters = $matcher->match($context->getPathInfo());

        $controller = $parameters['_controller'];
        $method = $parameters['_method'];
        unset($parameters['_controller']);
        unset($parameters['_method']);
        unset($parameters['_route']);

        $callable = [new $controller(), $method];
        $bagParams = new ParametersBag();
        $queryParams = $request->getQueryParams();

        foreach ($parameters as $key => $value) {
            $param = new Parameter('path', $key, $value);
            $bagParams->addParameter($param);
        }
        foreach ($queryParams as $key => $value) {
            $param = new Parameter('query', $key, $value);
            $bagParams->addParameter($param);
        }

        return [
            'callable' => $callable,
            'params' => $bagParams,
        ];
    }

    protected function initRoute()
    {
        $this->routeCollection = new RouteCollection();
        $routes = json_decode(file_get_contents(__DIR__.'/../../config/routing/routes.json'), true);
        foreach ($routes as $route) {
            $this->routeCollection->add(
                $route['name'],
                new Route(
                    $route['path'],
                    ['_controller' => $route['_controller'], '_method' => $route['_method']],
                    [],
                    [],
                    '',
                    [],
                    $route['_methods']

                )
            );
        }
    }
}
