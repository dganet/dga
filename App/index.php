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
$app->group('/associado', function() use ($app){

	$app->post('/save', function(Request $request, Response $response){
		$associado = new \Api\Controller\AssociadoController();
		$post = json_decode($request->getBody(), true);
		if ($associado->cadastrar($associado)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($associado);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson(['save' => false]);
		}
		return $response;
	});
	//Lista Todos os Associados
	$app->get('/list', function(Request $request, Response $response){
		$associadoController = new \Api\Controller\AssociadoController();
		$associado = $associadoController->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
		return $response;
	});
	//Lista Associado por ID
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$associado = new \Api\Controller\AssociadoController();
		$associado = $associado->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
		return $response;
	});
	//Atualiza Todos os Associados
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody());
		$associado = new \Api\Controller\AssociadoController();
		if ($associado->atulizaCadastro($associado)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($associado);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson(['save' => false]);
		}
		return $response;
	});
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$associado = new \Api\Controller\AssociadoController();
		return $associado->inativar($args['id']);
	});
});

/**
*	POST
*/
// Salva um post
$app->group('/post', function() use ($app){

	$app->post('/save', function(Request $request, Response $response){
		$postController = new \Api\Controller\Postcontroller();
		$post = json_decode($request->getBody(), true);
		if ($postController->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($postController);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson(['save' => false]);
		}
		return $response;
	});
	//lista todos os POSTs
	$app->get('/list', function(Request $request, Response $response){
		$postController = new \Api\Controller\PostController();
		$postController = $postController->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
	//Lista post por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$postController = new \Api\Controller\PostController();
		$postController = $postController->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$postController = new \Api\Controller\Postcontroller();
		if ($postController->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($postController);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson(['update' => false]);
		}
		return $response;
	});
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$postController = new \Api\Controller\Postcontroller();
		$postController =  $postController->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
});



$app->run();