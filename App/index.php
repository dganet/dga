<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Api\Controller as Controller;
require_once "vendor/autoload.php";

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
$app->group('/ordem', function(Request $request, Response $response){
  $app->get('/', Controller\OrdemController::class . ':list');
});


$app->run();
