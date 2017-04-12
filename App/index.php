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
 * USUARIOS
 */
//Lista todos os usuarios
$app->get('/usuario/list', \Api\Controller\UsuarioController::class . ':list');
//Lista os usuarios atraves do ID
$app->get('/usuario/list/{id}', \Api\Controller\UsuarioController::class . ':listById');
//Salva um novo usuario
$app->post('/usuario/save', \Api\Controller\UsuarioController::class . ':save');
//Atualiza as informações do usuario
$app->put('/usuario/update/{id}', \Api\Controller\UsuarioController::class . ':update');
//Inativa um Usuario
$app->delete('/usuario/delete/{id}', \Api\Controller\UsuarioController::class . ':delete');
//FIM USUARIOS
/**
 * IMOVEIS
 */
//Lista todos os Imoveis
$app->get('/imovel/list', \Api\Controller\ImovelController::class . ':list');
//Lista Imoveis atraves do ID
$app->get('/imovel/list/{id}', \Api\Controller\ImovelController::class . ':listById');
$app->run();