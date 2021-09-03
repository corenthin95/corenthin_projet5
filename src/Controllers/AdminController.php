<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Application\Http\RedirectResponseHttp;
use Psr\Http\Message\ServerRequestInterface;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use PhpParser\Builder\Param;

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
        if (!array_key_exists('user', $_SESSION) || (array_key_exists('user', $_SESSION) && $_SESSION['user']['is_admin'] !== '1')) 
        {
            $response = new RedirectResponseHttp('/');
            $response->send();
        }

        $articles = $this->articleRepository->findAll();
        
        return $this->renderHtml(
            'security/indexAdmin.html.twig',
            [
                'articles' => $articles
            ]
        );
    }

    public function addArticle(ServerRequestInterface $request, ParametersBag $bag)
    {
        
    }

    public function validArticle(ServerRequestInterface $request, ParametersBag $bag)
    {

    }

    public function editArticle(ServerRequestInterface $request, ParametersBag $bag)
    {

    }

    public function deleteArticle(ServerRequestInterface $request, ParametersBag $bag)
    {

    }
}