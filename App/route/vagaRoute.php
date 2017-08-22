<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//Loga o Usuario
$app->post('/vagas/login', \Api\Controller\VagaController::class . ':login');
/**
 * Salva um Usuario
 */
$app->post('/vagas/save/{token}', \Api\Controller\UsuarioController::class . ':cadastrar');
/**
 * Lista todos os Usuarios Ativos
 */
$app->get('/vagas/list', \Api\Controller\VagaController::class . ':listaTudo');
/**
 * Lista usuarios por ID
 */
$app->get('/vagas/associadoxveiculo/{idVeiculo}', \Api\Controller\VagaController::class . ':AssociadoxVeiculo');
/**
 * Lista usuarios inativos
 */
$app->get('/vagas/inativo/{token}', \Api\Controller\VagaController::class . ':listaInativo');
/**
 * Atualiza o cadastro de um usuario
 */
$app->put('/vagas/update/{token}', \Api\Controller\VagaController::class . ':atulizaCadastro');
/**
 * Inativa um cliente
 */
$app->delete('/vagas/delete/{token}/{id}', \Api\Controller\VagaController::class . ':inativar');












// $app->post('/save/{id}', function(Request $request, Response $response, $args){
// 		$vaga = new \Api\Controller\VagaController();
// 		$post = json_decode($request->getBody(), true);
// 		$post['usuario_id'] = $args['id'];
// 		if ($vaga->cadastrar($post)){
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([true]);
// 		}else{
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([false]);
// 		}
// 		return $response;
// 	});
// 	//lista todos os POSTs
// 	$app->get('/list', function(Request $request, Response $response){
// 		$vaga = new \Api\Controller\VagaController();
// 		$vaga = $vaga->listaTudo();
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($vaga);
// 		return $response;
// 	});
// 	//Lista post por Id
// 	$app->get('/list/{id}', function(Request $request, Response $response, $args){
// 		$vaga = new \Api\Controller\VagaController();
// 		$vaga = $vaga->listaPorId($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($vaga);
// 		return $response;
// 	});
// 	//Lista registros inativos
// 	$app->get('/inativo', function(Request $request, Response $response){
// 		$vaga = new \Api\Controller\VagaController();
// 		$vaga = $vaga->listaInativo();
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($vaga);
// 		return $response;
// 	});
// 	//Atualiza cadastro
// 	$app->put('/update/{id}', function(Request $request, Response $response, $args){
// 		$post = json_decode($request->getBody(), true);
// 		$vaga = new \Api\Controller\VagaController();
// 		if ($vaga->atulizaCadastro($post)){
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([true]);
// 		}else{
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([false]);
// 		}
// 		return $response;
// 	});
// 	//Inativa um Vaga
// 	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
// 		$vaga = new \Api\Controller\VagaController();
// 		$vaga =  $vaga->inativar($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($vaga);
// 		return $response;
// 	});