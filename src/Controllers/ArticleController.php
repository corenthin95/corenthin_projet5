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

    public function editComment(ServerRequestInterface $request, ParametersBag $bag)
    {
        $errors = null;
        $id = $bag->getParameter('id')->getValue();
        $comment = $this->commentRepository->findCommentsByArticleWithUserInformations($id);

        if($request->getMethod() === 'POST') {

            $dataSubmitted = $request->getParsedBody();

            if(strlen($dataSubmitted['content']) > 10) {
                $this->commentRepository->editComment($id, $dataSubmitted['content']);
                return $this->redirect('/comments/'. $id .'/edit');
            } else {
                $errors = 'Tous les champs doivent être remplis';
            }
        }

        return $this->renderHtml(
            'comments/editComments.html.twig',
            [
                'errors' => $errors,
                'comment' => $comment
            ]
        );
    }

    public function deleteComment(ServerRequestInterface $request, ParametersBag $bag)
    {
        $this->commentRepository->deleteComment($bag->getParameter('id')->getValue());

        return $this->redirect($request->getServerParams()['HTTP_REFERER']);
    }
}