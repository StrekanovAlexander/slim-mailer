<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App([
  'settings' => [
    'displayErrorDetails' => true,
  ]
]);
$c = $app->getContainer();

$c['view'] = function($c) {
  $view = new \Slim\Views\Twig(__DIR__ . '/../private/views', [
    'cache' => false,
  ]);

  $view->addExtension(new \Slim\Views\TwigExtension(
    $c->router,
    $c->request->getUri()
  ));

  return $view;
};

$c['MailerController'] = function($c) {
  return new \App\Controllers\MailerController($c);
};

$app->get('/', 'MailerController:index');

$app->get('/send', 'MailerController:sendMail')->setName('send');

$app->run();
