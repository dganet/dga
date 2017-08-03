<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//Loga o Usuario
$app->post('/usuario/login', \Api\Controller\UsuarioController::class . ':login');
/**
 * Salva um Usuario
 */
$app->post('/usuario/save', \Api\Controller\UsuarioController::class . ':cadastrar');
/**
 * Lista todos os Usuarios Ativos
 */
$app->get('/usuario/list', \Api\Controller\UsuarioController::class . ':listaTudo');
/**
 * Lista usuarios por ID
 */
$app->get('/usuario/list/{id}', \Api\Controller\UsuarioController::class . ':listaPorId');
/**
 * Lista usuarios inativos
 */
$app->get('/usuario/inativo', \Api\Controller\UsuarioController::class . ':listaInativo');
/**
 * Atualiza o cadastro de um usuario
 */
$app->put('/usuario/update/{id}', \Api\Controller\UsuarioController::class . ':atulizaCadastro');
/**
 * Inativa um cliente
 */
$app->delete('/usuario/delete/{id}', \Api\Controller\UsuarioController::class . ':inativar');