<?php 

namespace App\Controllers;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class App 
{

    public function run(ServerRequestInterface $request): ResponseInterface {

        $uri = $request->getUri()->getPath();
        if (!empty($uri) && $uri[-1] === "/") {
            $response = new Response();
            $response->withStatus(301);
            $response->withHeader('Location', substr($uri, 0, -1 ));
            return $response;
        }
        $response = new Response();
        $response->getBody()->write('Bonjour');
        return $response;
    }
    
}