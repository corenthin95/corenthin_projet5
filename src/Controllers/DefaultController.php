<?php

namespace App\Controllers;

class DefaultController extends AbstractController 
{
    public function home()
    {
        return $this->render('home.html.twig');
    }

    public function articles()
    {
        return $this->render('articles/listArticles.html.twig',
        [
            'articles' => articles()
        ]);
    }

    public function login()
    {
        return $this->render('login.html.twig');
    }
}




/*switch ($page) {
    case 'home':
        echo $twig->render('home.html.twig');
        break;
    case 'articles':
        echo $twig->render('articles/listArticles.html.twig', ['articles' => articles()]);
        break;
    case 'login':
        echo $twig->render('login.html.twig');
        break;
    default:
        header('HTTP/1.0 404 Not found');
        echo $twig->render('404.html.twig');
        break;
}*/