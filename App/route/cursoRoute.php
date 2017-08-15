<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Salva um novo curso
$app->get('/curso/save/{token}', \Api\Controller\CursoController::class . ':cadastro');
//Lista todos os curso
$app->get('/curso/list', \Api\Controller\CursoController::class . ':listaTudo');
//Lista curso por Id
$app->get('/curso/list/{id}', \Api\Controller\CursoController::class . ':listaPorId');
//Lista registros inativos
$app->get('/curso/inativo/{token}', \Api\Controller\CursoController::class . ':listaInativo');
//Atualiza cadastro
$app->put('/curso/update/{token}', \Api\Controller\CursoController::class . ':atualizaCadastro');
//Inativa um curso
$app->delete('/curso/delete/{token}/{id}', \Api\Controller\CursoController::class . ':inativar');
