<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
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
	//Lista os Associados Inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$associado = new \Api\Controller\AssociadoController();
		$associado = $associado->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($associado);
		return $response;
	});
	//Atualiza os Associados
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
	//Lista registros Inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$postController = new \Api\Controller\PostController();
		$postController = $postController->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($postController);
		return $response;
	});
	//Atualiza POST
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
});
/**
* VAGA
*/
$app->group('/vaga', function() use ($app){

	$app->post('/save', function(Request $request, Response $response){
		$vaga = new \Api\Controller\VagaController();
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
});

/**
* CURSO
*/
$app->group('/curso', function() use ($app){

	$app->post('/save/{id}', function(Request $request, Response $response, $args){
		$curso = new \Api\Controller\CursoController();
		$post = json_decode($request->getBody(), true);
		$post['usuario_id'] = $args['id'];
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
		$curso = new \Api\Controller\CursoController();
		$curso = $curso->listaTudo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Lista curso por Id
	$app->get('/list/{id}', function(Request $request, Response $response, $args){
		$curso = new \Api\Controller\CursoController();
		$curso = $curso->listaPorId($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Lista registros inativos
	$app->get('/inativo', function(Request $request, Response $response){
		$curso = new \Api\Controller\CursoController();
		$curso = $curso->listaInativo();
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
	//Atualiza cadastro
	$app->put('/update/{id}', function(Request $request, Response $response, $args){
		$post = json_decode($request->getBody(), true);
		$curso = new \Api\Controller\CursoController();
		if ($curso->atulizaCadastro($post)){
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
		$curso = new \Api\Controller\CursoController();
		$curso =  $curso->inativar($args['id']);
		$response = $response->withHeader('Content-type', 'application/json');
		$response = $response->withJson($curso);
		return $response;
	});
});
/**
* OPORTUNIDADE
*/
$app->group('/oportunidade', function() use ($app){

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
});


$app->get('/teste', function (Request $request, Response $response){
	\Api\Model\Log::Error("mensagem de teste\n");
});

$app->run();