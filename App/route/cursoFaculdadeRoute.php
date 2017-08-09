<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Cadastra um novo curso
$app->post('/cursofaculdade/save', \Api\Controller\CursoFaculdadeController::class . ':cadastrar');

// 	//lista todos os curso
$app->get('/cursofaculdade/list', \Api\Controller\CursoFaculdadeController::class . ':listaTudo');

// 	//lista os cursos e os associados em cada curso
$app->get('/cursofaculdade/listplus', \Api\Controller\CursoFaculdadeController::class . ':listaTudoPlus');

// 	//Lista Associados que estão em um determinado curso
$app->get('/cursofaculdade/list/{id}', \Api\Controller\CursoFaculdadeController::class . ':listaPorId');

// 	//Lista registros inativos
$app->get('/cursofaculdade/inativo', \Api\Controller\CursoFaculdadeController::class . ':listaInativo');

// 	//Atualiza cadastro
$app->put('/cursofaculdade/update/{id}', \Api\Controller\CursoFaculdadeController::class . ':atualizaCadastro');

// 	//Inativa um curso
$app->delete('/cursofaculdade/delete/{id}', \Api\Controller\CursoFaculdadeController::class . ':inativar');

