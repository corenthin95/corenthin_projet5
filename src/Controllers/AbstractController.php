<?php

namespace App\Controllers;

use App\Application\Templating\TwigTrait;
use App\Application\Http\RedirectResponseHttp;

abstract class AbstractController
{
    use TwigTrait;

    protected function isAuthentificated()
    {
        
    }
    
    public function getUser()
    {
        if(array_key_exists('user', $_SESSION)) {
            return $_SESSION['user'];
        }

        return null;
    }

    public function redirect($url)
    {
        header('Location: '. $url);
    }

    public function redirectIfIsNotAdmin()
    {
        if(!array_key_exists('user', $_SESSION) || (array_key_exists('user', $_SESSION) && $_SESSION['user']['is_admin'] !== '1')) 
        {
            $response = new RedirectResponseHttp('/');
            $response->send();
        }
    }
}