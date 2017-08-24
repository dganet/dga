<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
/**
 * Salva uma nova universidade, e coleta o ID de quem fez a requisição
 */
$app->post('/universidade/save/{token}', \Api\Controller\UniversidadeController::class . ':cadastrar');
// 	//lista todos os cursorso
$app->get('/universidade/list', \Api\Controller\UniversidadeController::class . ':listaTudo');
// 	//Lista curso por Id
$app->get('/universidade/list/{id}', \Api\Controller\UniversidadeController::class . ':listaPorId');
// 	//Lista registros inativos
$app->get('/universidade/inativo/{token}', \Api\Controller\UniversidadeController::class . ':listaInativo');
//Retorna veiculos que atendem a universidade x
$app->get('/universidade/veiculos/{id}', \Api\Controller\UniversidadeController::class . ':getVeiculos');
// 	//Atuaza cadastro e coleta o ID de quem fez a requisição
$app->put('/universidade/update/{token}', \Api\Controller\UniversidadeController::class . ':atulizaCadastro');
// 	//Inativa um curso
$app->delete('/universidade/delete/{token}/{id}', \Api\Controller\UniversidadeController::class . ':inativar');

