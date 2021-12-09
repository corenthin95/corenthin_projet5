<?php

namespace App;

use App\Application\Http\Parameter;
use App\Application\Http\ParametersBag;
use App\Controllers\StudentController;
use App\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Application
{
    protected RouteCollection $routeCollection;

    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(ServerRequestInterface $request)
    {
        try {
            $callableParams = $this->router->match($request);
            $response = call_user_func_array($callableParams['callable'], [$request, $callableParams['params']]);
            return $response;
        } catch (ResourceNotFoundException $e) {

        } catch (MethodNotAllowedException $e) {

        } catch (\Exception $e) {

        }
    }
}