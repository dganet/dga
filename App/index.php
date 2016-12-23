<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Rotas para o Sistema
/**
* SALVA O ASSOCIADO E RETORNA TRUE SE CONSEGUIU SALVAR E FALSE SE DEI ALGUM PROBLEMA
*/
$app->post('/associado/save', function(Request $request, Response $response){
	$associado = new \Api\Controller\AssociadoController();
	$post = json_decode($request->getBody(), true);
	
	if ($associado->cadastrar($post)){
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
	}else{
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson(['save' => false]);
	}
	return $response;
});
//Lista Todos os Associados
$app->get('/associado/list', function(Request $request, Response $response){
	$associadoController = new \Api\Controller\AssociadoController();
	$associado = $associadoController->listaTudo();
	$response = $response->withHeader('Content-type', 'application/json');
	$response = $response->withJson($associado);
	return $response;
});

$app->run();
