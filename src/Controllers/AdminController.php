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

        // TODO: droit seul a l'admin sur la création d'article
        // TODO: vérifier si requete sous POST donc soumission si oui
        if($request->getMethod() === 'POST') {
            // TODO: recuperer les inputs
            $dataSubmitted = $request->getParsedBody();
            // TODO: validation des inputs (les 3 champs remplis)
                // TODO: validation des 3 champs
                if(strlen($dataSubmitted['title']) > 0 && strlen($dataSubmitted['leadParagraph']) > 0 && strlen($dataSubmitted['content']) > 0) {
                // TODO: création de l'article en base
                    $user = $this->getUser();
                    $this->articleRepository->createArticle($dataSubmitted, $user);
                // TODO: redirection
                    $this->redirect('/articles');
                } else {
                    // TODO: champs invalides
                    // TODO: retourner les erreurs a l'user
                    $errors = 'Tous les champs doivent être remplis';
                }
        }
        // TODO: retourner la page
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
        // TODO: retrive article
        $article = $this->articleRepository->findById($id);
            // TODO: validate inputs for submission
            if($request->getMethod() === 'POST') {
                // TODO: checking and validate required field
                $dataSubmitted = $request->getParsedBody();
                // TODO: editing article from database
                if(strlen($dataSubmitted['title']) > 0 && strlen($dataSubmitted['leadParagraph']) > 0 && strlen($dataSubmitted['content']) > 0) {
                    // TODO: redirection
                    $this->articleRepository->editArticle($id, $dataSubmitted['title'], $dataSubmitted['leadParagraph'], $dataSubmitted['content']);
                    return $this->redirect('/articles/'. $id .'/edit');
                } else {
                    $errors = 'Tous les champs doivent être remplis';
                }
            }
        //TODO: return rendered page
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
        // TODO: retrive article and delete article
        $this->articleRepository->deleteArticle($bag->getParameter('id')->getValue());
    
        //TODO: redirection
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

    // public function editComment(ServerRequestInterface $request, ParametersBag $bag)
    // {
    //     $errors = null;
    //     $id = $bag->getParameter('id')->getValue();
    //     $comment = $this->commentRepository->findCommentsByArticleWithUserInformations($id);

    //     if($request->getMethod() === 'POST') {

    //         $dataSubmitted = $request->getParsedBody();

    //         if(strlen($dataSubmitted['content']) > 10) {
    //             $this->commentRepository->editComment($id, $dataSubmitted['content']);
    //             return $this->redirect('/comments/'. $id .'/edit');
    //         } else {
    //             $errors = 'Tous les champs doivent être remplis';
    //         }
    //     }

    //     return $this->renderHtml(
    //         'comments/editComments.html.twig',
    //         [
    //             'errors' => $errors,
    //             'comment' => $comment
    //         ]
    //     );
    // }
}