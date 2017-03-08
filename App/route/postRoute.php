<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$postController = new \Api\Controller\PostController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($postController->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
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
	//Lista registros Inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$postController = new \Api\Controller\PostController();
		$postController = $postController->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
	//Atualiza POST
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$postController = new \Api\Controller\PostController();
		if ($postController->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um Post
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$postController = new \Api\Controller\PostController();
		$postController =  $postController->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
