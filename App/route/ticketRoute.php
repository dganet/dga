<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Api\Controller\TicketController;

$app->get('/list', function(Request $request, Response $response){
    $ticketController = new TicketController();
    return $response->withJson($ticketController->listaTudo());
});
$app->post('/save/{id}', function(Request $request, Response $response){
    $ticketController = new TicketController();
    $post = json_decode($request->getBody(), true);
    $post['fkAssociado'] = $args['id'];
    return $response->withJson($ticketController->cadastrar($post));
});
$app->put('/update/{id}', function(Request $request, Response $response){
    $ticketController = new TicketController();
    $post = json_decode($request->getBody(), true);
    return $response->withJson($ticketController->atualizar($post));
});
$app->delete('/delete/{id}', function(Request $request, Response $response){
    $ticketController = new TicketController();
    $post = json_decode($request->getBody(), true);
    return $response->withJson($ticketController->deletar($post));
});