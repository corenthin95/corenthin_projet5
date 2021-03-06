<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class ArticleController extends AbstractController
{
    protected $articleRepository;
    protected $userRepository;
    protected $commentRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
        $this->userRepository = new UserRepository();
    }

    public function listArticles(ServerRequestInterface $request, ParametersBag $bag)
    {
        $listArticles = $this->articleRepository->findAll();

        return $this->renderHtml(
            'articles/listArticles.html.twig',
            [
                'articles' => $listArticles
            ]
        );
    }

    public function show(ServerRequestInterface $request, ParametersBag $bag)
    {
        $id = $bag->getParameter('id')->getValue();
        $errors = null;
        $article = $this->articleRepository->findById($id);
        $comments = $this->commentRepository->findCommentsByArticleWithUserInformations($id);

        if (!$article) {
            throw new ResourceNotFoundException('Article non existant');
        }

        if($request->getMethod() === 'POST') { 
            
            $dataSubmitted = $request->getParsedBody();

            if (strlen($dataSubmitted['content']) > 10) {
                $user = $this->getUser();
                $this->commentRepository->createComment($dataSubmitted, $user, $id);
                $this->redirect('/articles/'. $id .'/show');
            } else {
                $errors = 'errors';
            }
        }

        return $this->renderHtml(
            'articles/showArticles.html.twig',
            [
                'article' => $article,
                'comments' => $comments,
                'errors' => $errors
            ]
        );
    }
}