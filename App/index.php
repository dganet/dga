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
$app->put('/usuario/update/{id}/{token}', \Api\Controller\UsuarioController::class . ':update');
//Inativa um Usuario
$app->delete('/usuario/delete/{id}/{token}', \Api\Controller\UsuarioController::class . ':delete');
//FIM USUARIOS
/**
 * AUTENTICACAO
 */
//Loga usuario
$app->post('/usuario/login', \Api\Controller\AuthController::class . ':logar');
//Verifica o usuario Logado
$app->get('/usuario/login/{token}', \Api\Controller\AuthController::class . ':checkLogin');
//FIM AUTENTICACAO
/**
 * IMOVEIS
 */
//FIM IMOVEIS
/**
 * Proprietario
 */
//Lista todos os proprietario
$app->get('/proprietario/list', \Api\Controller\ProprietarioController::class . ':list');
//Lista os proprietarios atraves do ID
$app->get('/proprietario/list/{id}', \Api\Controller\ProprietarioController::class . ':listById');
//Salva um novo proprietario
$app->post('/proprietario/save/{token}', \Api\Controller\ProprietarioController::class . ':save');
//Atualiza as informações do proprietario
$app->put('/proprietario/update/{id}/{token}', \Api\Controller\ProprietarioController::class . ':update');
//Inativa um proprietario
$app->delete('/proprietario/delete/{id}/{token}', \Api\Controller\ProprietarioController::class . ':delete');
//FIM Proprietario
$app->run();