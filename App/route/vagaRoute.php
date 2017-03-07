<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$vaga = new \Api\Controller\VagaController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($vaga->cadastrar($post)){
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
		$vaga = new \Api\Controller\VagaController();
		$vaga = $vaga->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($vaga);
		return $response;
	});
	//Lista post por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$vaga = new \Api\Controller\VagaController();
		$vaga = $vaga->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($vaga);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$vaga = new \Api\Controller\VagaController();
		$vaga = $vaga->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($vaga);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$vaga = new \Api\Controller\VagaController();
		if ($vaga->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um Vaga
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$vaga = new \Api\Controller\VagaController();
		$vaga =  $vaga->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($vaga);
		return $response;
	});