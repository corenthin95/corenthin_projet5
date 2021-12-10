<?php

namespace App\Controllers;

use App\Application\Http\RedirectResponseHttp;
use App\Application\Templating\TwigTrait;
use App\Application\Http\ParametersBag;
use Psr\Http\Message\ServerRequestInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class DefaultController extends AbstractController
{
    public function homepage(ServerRequestInterface $request, ParametersBag $bag)
    {
        $errors = null;
        if ($request->getMethod() === 'POST') {

            $dataSubmitted = $request->getParsedBody();
            if(strlen($dataSubmitted['name']) > 0 && strlen($dataSubmitted['message']) > 0 && strlen($dataSubmitted['email']) > 0) {

                $configPHPMailer = require(__DIR__.'/../../config/phpmailer/config_phpmailer.php');
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = $configPHPMailer['host'];
                $mail->SMTPAuth   = true;
                $mail->Username   = $configPHPMailer['username'];
                $mail->Password   = $configPHPMailer['password'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
            
                $mail->setFrom($dataSubmitted['email']);
                $mail->addAddress($configPHPMailer['adressReception']);
                $mail->addReplyTo($dataSubmitted['email']);
            
                $mail->isHTML(true);
                $mail->Subject = $dataSubmitted['name'];
                $mail->Body    = $dataSubmitted['message'];
            
                $mail->send();

            } else {
                $errors = 'Tous les champs doivent être remplis.';
            }
        }

        return $this->renderHtml(
            'homepage/home.html.twig',
            [
                'errors' => $errors
            ]
        );
    }
    
}