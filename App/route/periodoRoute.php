<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$periodo = new \Api\Controller\PeriodoController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($periodo->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//lista todos os periodo
	$app->get('/list', function(Request $request, Response $response){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo = $periodo->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});
	//Lista periodo por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo = $periodo->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo = $periodo->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$periodo = new \Api\Controller\PeriodoController();
		if ($periodo->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um Periodo
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo =  $periodo->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});