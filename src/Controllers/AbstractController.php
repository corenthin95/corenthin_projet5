<?php

namespace App\Controllers;

use App\Application\Templating\TwigTrait;

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
}