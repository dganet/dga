<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/universidade/save', \Api\Controller\UniversidadeController::class . ':cadastrar');
// 	//lista todos os curso
$app->get('/universidade/list', \Api\Controller\UniversidadeController::class . ':listaTudo');
// 	//Lista curso por Id
$app->get('/universidade/list/{id}', \Api\Controller\UniversidadeController::class . ':listaPorId');
// 	//Lista registros inativos
$app->get('/universidade/inativo', \Api\Controller\UniversidadeController::class . ':listaInativo');
// 	//Atuza cadastro
$app->put('/universidade/update/{id}', \Api\Controller\UniversidadeController::class . ':atulizaCadastro');
// 	//Inativa um curso
$app->delete('/universidade/delete/{id}', \Api\Controller\UniversidadeController::class . ':inativar');

