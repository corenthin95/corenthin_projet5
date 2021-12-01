<?php

namespace App\Controllers;

use App\Application\Http\RedirectResponseHttp;
use App\Application\Templating\TwigTrait;
use App\Application\Http\ParametersBag;
use Psr\Http\Message\ServerRequestInterface;

class DefaultController extends AbstractController
{
    public function homepage(ServerRequestInterface $request, ParametersBag $bag)
    {
        return $this->renderHtml('homepage/home.html.twig');
    }

    
}