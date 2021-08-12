<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class ArticleController extends AbstractController
{
    protected $articleRepository;

    protected $commentRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
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
        $article = $this->articleRepository->findById($bag->getParameter('id')->getValue());
        if (!$article) {
            throw new ResourceNotFoundException('Article non existant');
        }

        return $this->renderHtml(
            'articles/editArticles.html.twig',
            [
                'article' => $article
            ]
        );
    }

    public function show(ServerRequestInterface $request, ParametersBag $bag)
    {
        $article = $this->articleRepository->findById($bag->getParameter('id')->getValue());
        if (!$article) {
            throw new ResourceNotFoundException('Article non existant');
        }

        $comments = $this->commentRepository->findByArticleId($bag->getParameter('id')->getValue());

        return $this->renderHtml(
            'articles/showArticles.html.twig',
            [
                'article' => $article,
                'comments' => $comments
            ]
        );
    }
}