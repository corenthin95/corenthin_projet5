<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Application\Http\RedirectResponseHttp;
use Psr\Http\Message\ServerRequestInterface;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use DateTime;
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
        if(!array_key_exists('user', $_SESSION) || (array_key_exists('user', $_SESSION) && $_SESSION['user']['is_admin'] !== '1')) 
        {
            $response = new RedirectResponseHttp('/');
            $response->send();
        }

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
                    
                    try {

                        $this->articleRepository->editArticle($id, $dataSubmitted['title'], $dataSubmitted['leadParagraph'], $dataSubmitted['content']);
                     
                    } catch(\Exception $e) {
                        dump($e);
                        die();
                    }
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
        
        // TODO: retrive article
            //TODO: delete article

                $this->articleRepository->deleteArticle($bag->getParameter('id')->getValue());
            
            
                //TODO: redirection
                return $this->redirect($request->getServerParams()['HTTP_REFERER']);
    }
}