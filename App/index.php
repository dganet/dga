<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Rotas para o Sistema
/**
* SALVA O ASSOCIADO E RETORNA TRUE SE CONSEGUIU SALVAR E FALSE SE DEI ALGUM PROBLEMA
*/
$app->group('/associado', function() use ($app){

	$app->post('/login', function(Request $request, Response $response){
		$associado = new \Api\Controller\AssociadoController();
		$post = json_decode($request->getBody(), true);
		$associado = $associado->logar($post);
		if ($associado['check']){
			unset($associado['check']);
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson($associado);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});

	$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$associado = new \Api\Controller\AssociadoController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		if ($associado->cadastrar($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-xtype', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Lista Todos os Associados
	$app->get('/list', function(Request $request, Response $response){
		$associadoController = new \Api\Controller\AssociadoController();
		$associado = $associadoController->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
		return $response;
	});
	//Lista Associado por ID
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$associado = new \Api\Controller\AssociadoController();
		$associado = $associado->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
		return $response;
	});
	//Atualiza Todos os Associados
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
		$associado = new \Api\Controller\AssociadoController();
		if ($associado->atulizaCadastro($post)){
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([true]);
		}else{
			$response = $response->withHeader('Content-type', 'application/json');
			$response = $response->withJson([false]);
		}
		return $response;
	});
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$associado = new \Api\Controller\AssociadoController();
		return $associado->inativar($args['id']);
	});
});
/**
*	POST
*/
// Salva um post
$app->group('/post', function() use ($app){

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
	//Atualiza cadastro
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
});
/**
*	USUARIO
*/
$app->group('/usuario', function() use ($app){

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
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$usuario = new \Api\Controller\UsuarioController();
		$usuario =  $usuario->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($usuario);
		return $response;
	});
});
/**
* VAGA
*/
$app->group('/vaga', function() use ($app){

	$app->post('/save', function(Request $request, Response $response){
		$vaga = new \Api\Controller\vagaController();
		$post = json_decode($request->getBody(), true);
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
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$vaga = new \Api\Controller\VagaController();
		$vaga =  $vaga->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($vaga);
		return $response;
	});
});
/**
* PERIODO
*/
$app->group('/periodo', function() use ($app){

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
	//lista todos os POSTs
	$app->get('/list', function(Request $request, Response $response){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo = $periodo->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});
	//Lista post por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo = $periodo->listaPorId($args['id']);
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
	//Inativa um Associado
	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
		$periodo = new \Api\Controller\PeriodoController();
		$periodo =  $periodo->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($periodo);
		return $response;
	});
});

$app->get('/teste', function (Request $request, Response $response){
	$teste = new \Api\Controller\AssociadoController();
	$bla = $teste->test();
	echo $bla;
});

$app->run();