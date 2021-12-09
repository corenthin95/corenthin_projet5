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
                //$to = 'corenthin.flamand@gmail.com';
                //$headers = ['email' => $dataSubmitted['email']];
                //    mail(
                //        $to,
                //        $dataSubmitted['name'],
                //        $dataSubmitted['message'],
                //        $headers
                //    );

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings                                           //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'corenthin.flamand@gmail.com';                     //SMTP username
                    $mail->Password   = 'azerty51';                                     //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom($dataSubmitted['email']);
                    $mail->addAddress('corenthin.flamand@gmail.com');            //Add a recipient
                    $mail->addReplyTo($dataSubmitted['email']);
                
                    //Content
                    $mail->isHTML(true);                                          //Set email format to HTML
                    $mail->Subject = $dataSubmitted['name'];
                    $mail->Body    = $dataSubmitted['message'];
                
                    $mail->send();
                    echo 'Message bien envoyé';
                } catch (\Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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