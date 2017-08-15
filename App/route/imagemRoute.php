<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Salva uma nova imagem
$app->get('/imagem/save/{token}', \Api\Controller\ImageController::class . ':cadastro');
//Lista todas as imagens
$app->get('/imagem/list', \Api\Controller\ImageController::class . ':listaTudo');
//Lista imagens por Id
$app->get('/imagem/listid/{id}', \Api\Controller\ImageController::class . ':listaPorId');
//Lista imagens por tipo
$app->get('/imagem/listtipo/{tipo}', \Api\Controller\ImageController::class . ':listaPorTipo');
//Lista registros inativos
$app->get('/imagem/inativo/{token}', \Api\Controller\ImageController::class . ':listaInativo');
//Atualiza imagen
$app->put('/imagem/update/{token}', \Api\Controller\ImageController::class . ':atualizaCadastro');
//Inativa um imagen
$app->delete('/imagem/delete/{token}/{id}', \Api\Controller\ImageController::class . ':inativar');
