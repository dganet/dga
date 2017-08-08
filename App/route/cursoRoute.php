<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Salva um novo curso
$app->get('/curso/save', \Api\Controller\CursoController::class . ':cadastro');
//Lista todos os curso
$app->get('/curso/list', \Api\Controller\CursoController::class . ':listaTudo');
//Lista curso por Id
$app->get('/curso/list/{id}', \Api\Controller\CursoController::class . ':listaPorId');
//Lista registros inativos
$app->get('/curso/inativo', \Api\Controller\CursoController::class . ':listaInativo');
//Atualiza cadastro
$app->put('/curso/update/{id}', \Api\Controller\CursoController::class . ':atualizaCadastro');
//Inativa um curso
$app->delete('/curso/delete/{id}', \Api\Controller\CursoController::class . ':inativar');
