<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->post('/oportunidade/save/{token}', \Api\Controller\OportunidadeController::class . ':cadastrar');
// 	//lista todos os curso
$app->get('/oportunidade/list', \Api\Controller\OportunidadeController::class . ':listaTudo');
// 	//Lista curso por Id
$app->get('/oportunidade/list/{id}', \Api\Controller\OportunidadeController::class . ':listaPorId');
// 	//Lista registros inativos
$app->get('/oportunidade/inativo/{token}', \Api\Controller\OportunidadeController::class . ':listaInativo');
// 	//Atuza cadastro
$app->put('/oportunidade/update/{token}', \Api\Controller\OportunidadeController::class . ':atualizaCadastro');
// 	//Inativa um curso
$app->delete('/oportunidade/delete/{token}/{id}', \Api\Controller\OportunidadeController::class . ':inativar');