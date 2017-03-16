<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$universidade = new \Api\Controller\UniversidadeController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($universidade->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//lista todos os curso
	$app->get('/list', function(Request $request, Response $response){
		$universidade = new \Api\Controller\UniversidadeController();
		$universidade = $universidade->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($universidade);
		return $response;
	});
	//Lista curso por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$universidade = new \Api\Controller\UniversidadeController();
		$universidade = $universidade->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($universidade);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$universidade = new \Api\Controller\UniversidadeController();
		$universidade = $universidade->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($universidade);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$universidade = new \Api\Controller\UniversidadeController();
		if ($universidade->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um curso
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$universidade = new \Api\Controller\UniversidadeController();
		$universidade =  $universidade->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($universidade);
		return $response;
	});
