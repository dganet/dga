<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$curso = new \Api\Controller\CursoFaculdadeController();
		$post = json_decode($request->getBody(), true);
		if ($curso->cadastrar($post)){
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
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso = $curso->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//lista os cursos e os associados em cada curso
	$app->get('/listplus', function(Request $request, Response $response){
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso = $curso->listaTudoPlus();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Lista Associados que estão em um determinado curso
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso = $curso->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso = $curso->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso = $curso->atulizaCadastro($post);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Inativa um curso
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$curso = new \Api\Controller\CursoFaculdadeController();
		$curso =  $curso->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
