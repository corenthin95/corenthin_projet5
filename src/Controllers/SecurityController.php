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
        // $uppercase = preg_match('@[A-Z@', $datasSubmitted);
        // $lowercase = preg_match('@[a-z]@', $datasSubmitted);
        // $number = preg_match('@[0-9]@', $datasSubmitted);
        // $specialChars = preg_match('@[^\w]@', $datasSubmitted);

        if ($request->getMethod() === 'POST') {

            $dataSubmitted = $request->getParsedBody();

            if(strlen($dataSubmitted['pseudo']) > 0 
            && strlen($dataSubmitted['name']) > 0
            && strlen($dataSubmitted['firstname']) > 0
            && strlen($dataSubmitted['email'])  > 0
            && /* !$uppercase || !$lowercase || !$number || !$specialChars ||  */strlen($dataSubmitted['password']) > 0) {

                password_hash($dataSubmitted['password'], PASSWORD_DEFAULT);
                $this->userRepository->createUser($dataSubmitted);
                $this->redirect('/');

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
            // Retrive submitted datas
            $dataSubmitted = $request->getParsedBody();
            // Validate submitted datas
            if (!array_key_exists('_csrf_token', $dataSubmitted) ||
            $dataSubmitted['_csrf_token'] !== $_SESSION['token']
            ) {
                $errors[]= 'Jeton CSRF invalide.';
            } else if (strlen($dataSubmitted['email']) === 0 || strlen($dataSubmitted['password']) === 0) {
                $errors[] = 'L\'adresse email et le mot de passe doivent être renseigné.'; 
            } else {
                // Retrive user from database
                $user = $this->userRepository->findByEmail($dataSubmitted['email']);
                // Check if submitted password is identical from database
                if (password_verify($dataSubmitted['password'], $dataSubmitted['email'], $user)) {
                    // If KO, show error message
                    $errors = 'Identifiants invalides.';
                } else {
                    // Redirect user to homepage
                    $_SESSION['user'] = $user;
                    $response = new RedirectResponseHttp('/');
                    return $response->send();
                }

                // if (!$user || $datasSubmitted['password'] !== $user['password']) {
                    // If KO Show error message
                    // $errors[]= 'Identifiants invalides.';
                // } else {
                    // If KO -> Redirect user to homepage and add infos from us in session
                //    $_SESSION['user'] = $user;
                //    $response = new RedirectResponseHttp('/');
                //    return $response->send();
                //}
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