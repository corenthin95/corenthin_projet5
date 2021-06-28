<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Application\Http\RedirectResponseHttp;
use Psr\Http\Message\ServerRequestInterface;

class AdminController extends AbstractController
{
    public function index(ServerRequestInterface $request, ParametersBag $bag)
    {
        if (array_key_exists('user', $_SESSION) && $_SESSION['user']['isAdmin'] !== '1') 
        {
            $response = new RedirectResponseHttp('/denied');
            $response->send();

            return;
        }

        exit;
    }
}