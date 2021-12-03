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
        $errors = null;
        if ($request->getMethod() === 'POST') {

            $dataSubmitted = $request->getParsedBody();

            if(strlen($dataSubmitted['name']) > 0 && strlen($dataSubmitted['message']) > 0 && strlen($dataSubmitted['email']) > 0) {

                $to = 'corenthin.flamand@gmail.com';
                $headers = ['email' => $dataSubmitted['email']];
                
                mail(
                    $to,
                    $dataSubmitted['name'],
                    $dataSubmitted['message'],
                    $headers
                );

                

            } else {
                $errors = 'Tous les champs doivent être remplis.';
            }

        }

        return $this->renderHtml(
            'homepage/home.html.twig',
            [
                'errors' => $errors
            ]
        );
    }
    
}