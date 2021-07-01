<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Repository\ArticleRepository;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class ArticleController extends AbstractController
{
    protected $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function listArticles(ServerRequestInterface $request, ParametersBag $bag)
    {
        // if (!$_SESSION['user']['isAdmin']);
        $listArticles = $this->articleRepository->findAll();

        return $this->renderHtml(
            'articles/listArticles.html.twig',
            [
                'articles' => $listArticles
            ]
        );
    }

    public function edit(ServerRequestInterface $request, ParametersBag $bag)
    {
        $student = $this->articleRepository->findById($bag->getParameter('id')->getValue());
        if (!$student) {
            throw new ResourceNotFoundException('Article non existant');
        }

        return $this->renderHtml(
            'articles/editArticles.html.twig',
            [
                'article' => $student
            ]
        );
    }
}