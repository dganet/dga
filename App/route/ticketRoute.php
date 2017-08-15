<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Api\Controller\TicketController;

//Salva uma nova Ticket
$app->get('/ticket/save/{token}', \Api\Controller\TicketController::class . ':cadastro');
//Lista todas as Tickets
$app->get('/ticket/list', \Api\Controller\TicketController::class . ':listaTudo');
//Lista Tickets por Id
$app->get('/ticket/listid/{id}', \Api\Controller\TicketController::class . ':listaPorId');
//Lista Tickets por tipo
$app->get('/ticket/listtipo/{tipo}', \Api\Controller\TicketController::class . ':listaPorTipo');
//Lista registros inativos
$app->get('/ticket/inativo/{token}', \Api\Controller\TicketController::class . ':listaInativo');
//Atualiza ticket
$app->put('/ticket/update/{token}', \Api\Controller\TicketController::class . ':atualizaCadastro');
//Inativa um ticket
$app->delete('/ticket/delete/{token}/{id}', \Api\Controller\TicketController::class . ':inativar');
