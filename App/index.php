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
//Confirma o email do usuairo
$app->get('/usuario/confirm/{creci}', \Api\Controller\UsuarioController::class . ':confirm');
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
/**
 * CLIENTE
 */
//Lista todos clientes de um usuario
$app->get('/cliente/list/{token}', \Api\Controller\ClienteController::class . ':list');
//Lista cliente atraves do Id
$app->get('/cliente/listId/{id}', \Api\Controller\ClienteController::class . ':listById');
//Salva um novo cliente
$app->post('/cliente/save/{token}', \Api\Controller\ClienteController::class . ':save');
// Atualiza as informações do cliente
$app->put('/cliente/update/{id}/{token}', \Api\Controller\ClienteController::class . ':update');
//Inativa o cliente
$app->get('/cliente/delete/{id}/{token}', \Api\Controller\ClienteController::class . ':delete');
// FIM CLIENTE
/**
 * TESTE
 */
$app->get('/teste/cache/{token}', \Api\Test\Teste::class . ':main');
//##################################################################
$app->run();