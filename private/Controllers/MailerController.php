<?php

namespace App\Controllers;

class MailerController extends Controller
{

  public function index($req, $res)
  {
    return $this->view->render($res, 'index.twig');
  }

  public function sendMail($req, $res)
  {
    // with google service
    $transport = (new \Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
      ->setUsername('user@gmail.com')
      ->setPassword('');
    
    $mailer = new \Swift_Mailer($transport);  

    $message = (new \Swift_Message('Test message'))
      ->setFrom(['user@gmail.com' => 'UserName'])
      ->setTo(['user@domain.com'])
      ->setBody('test');

    $result = $mailer->send($message);
    return 'Ok';

  }

}