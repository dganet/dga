<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$oportunidade = new \Api\Controller\OportunidadeController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($oportunidade->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//lista todos os oportunidade
	$app->get('/list', function(Request $request, Response $response){
		$oportunidade = new \Api\Controller\OportunidadeController();
		$oportunidade = $oportunidade->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($oportunidade);
		return $response;
	});
	//Lista oportunidade por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$oportunidade = new \Api\Controller\OportunidadeController();
		$oportunidade = $oportunidade->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($oportunidade);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$oportunidade = new \Api\Controller\OportunidadeController();
		$oportunidade = $oportunidade->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($oportunidade);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$oportunidade = new \Api\Controller\OportunidadeController();
		if ($oportunidade->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um oportunidade
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$oportunidade = new \Api\Controller\OportunidadeController();
		$oportunidade =  $oportunidade->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($oportunidade);
		return $response;
	});