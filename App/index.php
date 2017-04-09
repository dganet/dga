<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
/**
 * Lista todos os usuarios
 */
$app->get('/usuario/list', \Api\Controller\UsuarioController::class . ':list');
$app->post('/usuario/save', \Api\Controller\UsuarioController::class . ':save');
$app->put('/usuario/update{id}', \Api\Controller\UsuarioController::class . ':update');
$app->delete('/usuario/delete{id}', \Api\Controller\UsuarioController::class . ':delete');
//FIM USUARIOS

$app->run();