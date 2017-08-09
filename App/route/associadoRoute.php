<?php
/**
*	Gerenciamento de rotas atraves do Framework Slim3
*	@author Guilherme Brito
*	@version 1.0
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/associado/login', \Api\Controller\AssociadoController::class . ':logar');
$app->post('/associado/save/{id}', \Api\Controller\AssociadoController::class . ':cadastrar');
//Lista Todos os Associadosdo
$app->get('/associado/list', \Api\Controller\AssociadoController::class . ':listaAtivo');
//lista associados co status AGUARDANDOVAGA
$app->get('/associado/listaguardando', \Api\Controller\AssociadoController::class . ':listaAguardandoVaga');
//Lista associados com status AGUARDANDOVAGA e com ID {id}
$app->get('/associado/listaguardando/{id}', \Api\Controller\AssociadoController::class . ':listaAguardandoVagaId');
//Lista associados com status APROVACAO
$app->get('/associado/listaprovacao', \Api\Controller\AssociadoController::class . ':listaAguardandoAprovacao');
//Lista Geral
$app->get('/associado/listageral', \Api\Controller\AssociadoController::class . ':listaGeral');
//Lista Associado por ID
$app->get('/associado/list/{id}', \Api\Controller\AssociadoController::class . ':listaPorId');
//Lista os Associados Inativos
$app->get('/associado/inativo', \Api\Controller\AssociadoController::class . ':listaInativo');
//Atualiza os Associados
$app->put('/associado/update/{id}', \Api\Controller\AssociadoController::class . ':atulizaCadastro');
$app->put('/associado/ative/{id}', \Api\Controller\AssociadoController::class . ':ativaCadastro');
//Inativa um Associado
$app->delete('/associado/delete/{id}', \Api\Controller\AssociadoController::class . ':inativar');
//Lista Associados que estão em um determinado veiculo
$app->get('/associado/listveiculo/{id}', \Api\Controller\AssociadoController::class . ':listaAssociadoVeiculo');
// 	$app->post('/picture/{id}', function(Request $request, Response $response, $args){
// 		$associado = new \Api\Controller\AssociadoController();
// 		$post = json_decode($request->getBody(), true);
// 		$post['idAssoc'] = $args['id'];
// 		$associado = $associado->picture($post);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($associado);
// 		return $response;
// 	});
