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
//OS
$app->post('/os/cadastrar', Controller\OrdemController::class . ':save');
$app->get('/os/list', Controller\OrdemController::class . ':list');

//Tecnicos
$app->get('/tecnico/list', Controller\TecnicoController::class . ':list');
$app->post('/tecnico/save', Controller\TecnicoController::class . ':save');
//Problema
$app->get('/problema/list', Controller\ProblemaController::class . ':list');
$app->post('/problema/save', Controller\ProblemaController::class . ':save');
//Bairro
$app->get('/bairro/list', Controller\BairroController::class . ':list');
$app->get('/bairro/list/{id}', Controller\BairroController::class . ':listById');
$app->post('/bairro/save', Controller\BairroController::class . ':save');
//Servico
$app->get('/servico/list', Controller\ServicoController::class . ':list');
$app->post('/servico/save', Controller\ServicoController::class . ':save');

$app->run();
