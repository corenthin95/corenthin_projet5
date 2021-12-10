<?php

namespace App\Controllers;

use App\Application\Http\ParametersBag;
use App\Application\Http\RedirectResponseHttp;
use App\Repository\UserRepository;
use Psr\Http\Message\ServerRequestInterface;

class SecurityController extends AbstractController
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function registration(ServerRequestInterface $request, ParametersBag $bag)
    {
        $errors = [];

        if ($request->getMethod() === 'POST') {
            $dataSubmitted = $request->getParsedBody();
            if (strlen($dataSubmitted['pseudo']) > 0 
             && strlen($dataSubmitted['name']) > 0
             && strlen($dataSubmitted['firstname']) > 0
             && strlen($dataSubmitted['email'])  > 0
             && /* !$uppercase || !$lowercase || !$number || !$specialChars ||  */strlen($dataSubmitted['password']) > 10) {
                $userExist = $this->userRepository->findByEmail($dataSubmitted['email']);
                if($userExist) {
                    $errors[]= 'Utilisateur déjà existant';
                } else {
                    $hash = password_hash($dataSubmitted['password'], PASSWORD_DEFAULT);
                    $this->userRepository->createUser($dataSubmitted, $hash);
                    $this->redirect('/');
                }
            }
        }

        return $this->renderHtml(
            'security/register.html.twig',
            [
                'errors' => $errors
            ]
        );
    }

    public function login(ServerRequestInterface $request, ParametersBag $bag)
    {
        $errors = [];

        if ($request->getMethod() === 'POST') {
            $dataSubmitted = $request->getParsedBody();
            if (strlen($dataSubmitted['email']) === 0 || strlen($dataSubmitted['password']) === 0) {
                $errors[] = 'L\'adresse email et le mot de passe doivent être renseigné.'; 
            } else {
                $user = $this->userRepository->findByEmail($dataSubmitted['email']);
                if (password_verify($dataSubmitted['password'], $dataSubmitted['email'], $user)) {
                    $errors = 'Identifiants invalides.';
                } else {
                    $_SESSION['user'] = $user;
                    $response = new RedirectResponseHttp('/');
                    return $response->send();
                }
            }
        }

        return $this->renderHtml(
            'security/login.html.twig',
            [
                'errors' => $errors
            ]
            );
    }

    public function logout()
    {
        session_destroy();
        $response = new RedirectResponseHttp('/');
        return $response->send();
    }
}