<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Api\Controller\VeiculoController;

// Cria um novo veiculo
$app->post('/save/{id}', function(Request $request, Response $response, $args){
	$post = json_decode($request->getBody(), true);
	$controller = new VeiculoController();
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($controller->cadastrar($post));
	return $response;
});
// Atualiza Veiculo
$app->put('/update', function(Request $request, Response $response){
	$controller = new VeiculoController();
	$post = json_decode($request->getBody(), true);
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($controller->atulizaCadastro($post));
	return $response;
});
//Lista Veiculo
$app->get('/list', function (Request $request, Response $response){
	$controller = new VeiculoController();
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($controller->listaTudo());
	return $response;
});
// Deleta/Invativa um Veiculo atraves de um ID
$app->delete('/delete/{id}', function(Resquest $request, Response $response, $args){
	$controller = new VeiculoController();
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($controller->delete($args['id']));
	return $response;
});
$app->get('/list/{id}', function (Request $request, Response $response, $args){
	$controller = new VeiculoController();
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($controller->listaPorId($args['id']));
	return $response;
});