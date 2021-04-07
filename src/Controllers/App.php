<?php 

namespace App\Controllers;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class App 
{
    /**
     * List of modules
     * @var array
     */
    private $modules = [];

    /**
     * Router
     * @var Router
     */
    private $router;

    public function __construct(array $modules = [])
    {
        $this->router = new Router();
        foreach($modules as $module) {
            $this->modules[] = new $module($this->router);
        }
    }

    public function run(ServerRequestInterface $request): ResponseInterface {

        $uri = $request->getUri()->getPath();
        if (!empty($uri) && $uri[-1] === "/") {
            $response = (new Response())
            ->withStatus(301)
            ->withHeader('Location', substr($uri, 0, -1 ));
            return $response;
        }
        if ($uri === '/blog/mon-article') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }
        $route = $this->router->match($request);
        if (is_null($route)) {
            return new Response(404, [], '<h1>Erreur 404</h1>');
        }
        $response = call_user_func_array($route->getCallback(), [$request]);
        if (is_string($response)) {
            return new Response(200, [], $response);
        } elseif($response instanceof ResponseInterface) {
            return $response;
        } else {
            throw new \Exception('The response is not a string or an instance of ReponseInterface');
        }
    }
    
}