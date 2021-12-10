<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Application\Http\RedirectResponseHttp;
use Psr\Http\Message\ServerRequestInterface;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class AdminController extends AbstractController
{

    protected $articleRepository;

    protected $commentRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function indexAdmin(ServerRequestInterface $request, ParametersBag $bag)
    {
        $articles = $this->articleRepository->findAll();
        $comments = $this->commentRepository->findAll();
        
        return $this->renderHtml(
            'security/indexAdmin.html.twig',
            [
                'articles' => $articles,
                'comments' => $comments
            ]
        );
    }


    public function createArticle(ServerRequestInterface $request, ParametersBag $bag)
    { 
        $errors = null;
        $this->redirectIfIsNotAdmin();
        
        if($request->getMethod() === 'POST') {
            $dataSubmitted = $request->getParsedBody();
            if(strlen($dataSubmitted['title']) > 0 && strlen($dataSubmitted['leadParagraph']) > 0 && strlen($dataSubmitted['content']) > 0) {
                $user = $this->getUser();
                $this->articleRepository->createArticle($dataSubmitted, $user);
                $this->redirect('/articles');
            } else {
                $errors = 'Tous les champs doivent être remplis';
            }
        }

        return $this->renderHtml(
            'articles/addArticles.html.twig',
            [
                'errors' => $errors
            ]
        );
    }

    public function editArticle(ServerRequestInterface $request, ParametersBag $bag)
    {

        $errors = null;
        $this->redirectIfIsNotAdmin();
        $id = (int) $bag->getParameter('id')->getValue();
        $article = $this->articleRepository->findById($id);
            if($request->getMethod() === 'POST') {
                $dataSubmitted = $request->getParsedBody();

                if(strlen($dataSubmitted['title']) > 0 && strlen($dataSubmitted['leadParagraph']) > 0 && strlen($dataSubmitted['content']) > 0) {
                    $this->articleRepository->editArticle($id, $dataSubmitted['title'], $dataSubmitted['leadParagraph'], $dataSubmitted['content']);
                    return $this->redirect('/articles/'. $id .'/edit');
                } else {
                    $errors = 'Tous les champs doivent être remplis';
                }
            }

        return $this->renderHtml(
            'articles/editArticles.html.twig',
            [
                'errors' => $errors,
                'article' => $article
            ]
        );
    }

    public function deleteArticle(ServerRequestInterface $request, ParametersBag $bag)
    {
        $this->redirectIfIsNotAdmin();
        $this->articleRepository->deleteArticle($bag->getParameter('id')->getValue());
    
        return $this->redirect($request->getServerParams()['HTTP_REFERER']);
    }

    public function deleteComment(ServerRequestInterface $request, ParametersBag $bag)
    {
        $this->redirectIfIsNotAdmin();
        $this->commentRepository->deleteComment($bag->getParameter('id')->getValue());

        return $this->redirect($request->getServerParams()['HTTP_REFERER']);
    }

    public function validateComment(ServerRequestInterface $request, ParametersBag $bag)
    {
        $this->redirectIfIsNotAdmin();
        $this->commentRepository->validateComment($bag->getParameter('id')->getValue());

        return $this->redirect($request->getServerParams()['HTTP_REFERER']);
    }
}