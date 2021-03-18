<?php

namespace App\Controllers;

class DefaultController extends AbstractController 
{
    public function home()
    {
        return $this->render('articles/articles.html.twig',
            [
                'articles' => $articles,
            ]
        );
    }
}