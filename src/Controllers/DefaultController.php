<?php

namespace App\Controllers;

use App\Application\Http\RedirectResponseHttp;
use App\Application\Templating\TwigTrait;
use App\Application\Http\ParametersBag;
use Psr\Http\Message\ServerRequestInterface;

class DefaultController extends AbstractController
{
    public function homepage(ServerRequestInterface $request, ParametersBag $bag)
    {
        $errors = null;
        if ($request->getMethod() === 'POST') {

            $dataSubmitted = $request->getParsedBody();

            // if (!array_key_exists('_csrf_token', $dataSubmitted) ||
            // $dataSubmitted['_csrf_token'] !== $_SESSION['token']
            // ) {
            //     $errors[]= 'Jeton CSRF invalide.';
            // } else 
            if(strlen($dataSubmitted['name']) > 0 && strlen($dataSubmitted['message']) > 0 && strlen($dataSubmitted['email']) > 0) {
                //$to = 'corenthin.flamand@gmail.com';
                //$headers = ['email' => $dataSubmitted['email']];
                //    mail(
                //        $to,
                //        $dataSubmitted['name'],
                //        $dataSubmitted['message'],
                //        $headers
                //    );

                $mail = new PHPMailer;
                //Enable SMTP debugging. 
                $mail->SMTPDebug = 0;
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();
                //Set SMTP Host name                          
                $mail->Host = $hostname;
                //Set this to true if SMTP Host requires authentication to send email
                $mail->SMTPAuth = true;
                //Provide username and password     
                $mail->Username = $sender;
                $mail->Password = $mail_password;
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "ssl";
                //Set TCP port to connect to 
                $mail->Port = 465;
                $mail->From = $sender;  
                $mail->FromName = $sender_name;
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = $Subject;
                $mail->Body = $Body;
                $mail->AltBody = "This is the plain text version of the email content";
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
                else {
                       echo 'Mail Sent Successfully';
                }

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