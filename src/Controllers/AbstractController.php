<?php

namespace App\Controllers;

use App\Application\Templating\TwigTrait;

abstract class AbstractController
{
    use TwigTrait;

    protected function isAuthentificated()
    {
        
    }
}