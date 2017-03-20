<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save', function(Request $request, Response $response, $args){
		$img = new \Api\Controller\ImageController();
		$post = json_decode($request->getBody(), true);
		$img = $img->cadastrar($post);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($img);
		return $request;
	});
	//lista todos os img
	$app->get('/list', function(Request $request, Response $response){
		$img = new \Api\Controller\ImageController();
		$img = $img->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($img);
		return $response;
	});
	$app->get('/listtipo/{tipo}', function(Request $request, Response $response){
		$img = new \Api\Controller\ImageController();
		$img = $img->listaPorTipo($args['tipo']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($img);
		return $response;
	});
	//Lista img por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$img = new \Api\Controller\ImageController();
		$img = $img->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($img);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$img = new \Api\Controller\ImageController();
		if ($img->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um img
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$img = new \Api\Controller\ImageController();
		$img =  $img->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($img);
		return $response;
	});
