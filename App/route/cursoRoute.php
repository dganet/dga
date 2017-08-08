<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->post('/save/{id}', function(Request $request, Response $response, $args){
// 		$curso = new \Api\Controller\CursoController();
// 		$post = json_decode($request->getBody(), true);
// 		if ($curso->cadastrar($post)){
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([true]);
// 		}else{
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([false]);
// 		}
// 		return $response;
// 	});
// 	//lista todos os curso
$app->get('/curso/list', \Api\Controller\CursoController::class . ':listaTudo');
// 	$app->get('/list', function(Request $request, Response $response){
// 		$curso = new \Api\Controller\CursoController();
// 		$curso = $curso->listaTudo();
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($curso);
// 		return $response;
// 	});
// 	//Lista curso por Id
// 	$app->get('/list/{id}', function(Request $request, Response $response, $args){
// 		$curso = new \Api\Controller\CursoController();
// 		$curso = $curso->listaPorId($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($curso);
// 		return $response;
// 	});
// 	//Lista registros inativos
// 	$app->get('/inativo', function(Request $request, Response $response){
// 		$curso = new \Api\Controller\CursoController();
// 		$curso = $curso->listaInativo();
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($curso);
// 		return $response;
// 	});
// 	//Atualiza cadastro
// 	$app->put('/update/{id}', function(Request $request, Response $response, $args){
// 		$post = json_decode($request->getBody(), true);
// 		$curso = new \Api\Controller\CursoController();
// 		if ($curso->atulizaCadastro($post)){
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([true]);
// 		}else{
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([false]);
// 		}
// 		return $response;
// 	});
// 	//Inativa um curso
// 	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
// 		$curso = new \Api\Controller\CursoController();
// 		$curso =  $curso->inativar($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($curso);
// 		return $response;
// 	});
