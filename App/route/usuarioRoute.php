<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//Loga o Usuario
	$app->post('/login', function(Request $request, Response $response){
		$usuario = new \Api\Controller\UsuarioController();
		$post = json_decode($request->getBody(), true);
		$usuario = $usuario->login($post);
		if ($usuario['check']){
			unset($usuario['check']);
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($usuario);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Salva um usuario
	$app->post('/save', function(Request $request, Response $response){
		$usuario = new \Api\Controller\UsuarioController();
		$post = json_decode($request->getBody(), true);
		if ($usuario->cadastrar($post)){
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
		$usuario = new \Api\Controller\UsuarioController();
		$usuario = $usuario->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($usuario);
		return $response;
	});
	//Lista post por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$usuario = new \Api\Controller\UsuarioController();
		$usuario = $usuario->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($usuario);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$usuario = new \Api\Controller\UsuarioController();
		$usuario = $usuario->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($response);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$usuario = new \Api\Controller\UsuarioController();
		if ($usuario->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um Usuario
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$usuario = new \Api\Controller\UsuarioController();
		$usuario =  $usuario->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($usuario);
		return $response;
	});