<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//Cadastra uma nova noticia
$app->post('/post/save', \Api\Controller\PostController::class . ':cadastrar');
//Lista todos as Noticias
$app->get('/post/list', \Api\Controller\PostController::class . ':listaTudo');
//Lista noticias por Id
$app->get('/post/list/{id}', \Api\Controller\PostController::class . ':listaPorId');	
//Lista registros Inativos
$app->get('/post/inativo', \Api\Controller\PostController::class . ':listaInativo');	
//Atualiza as Noticias
$app->put('/post/update/{id}', \Api\Controller\PostController::class . ':atualizaCadastro');	
//Inativa um Post
$app->delete('/post/delete/{id}', \Api\Controller\PostController::class . ':inativar');	
