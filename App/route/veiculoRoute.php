<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Api\Controller\VeiculoController;
use \Api\Controller\AuditController as Audit;

$app->post('/veiculo/save', \Api\Controller\VeiculoController::class . ':cadastrar');
// 	//lista todos os curso
$app->get('/veiculo/list', \Api\Controller\VeiculoController::class . ':listaTudo');
// 	//Lista curso por Id
$app->get('/veiculo/list/{id}', \Api\Controller\VeiculoController::class . ':listaPorId');
// 	//Lista registros inativos
$app->get('/veiculo/inativo', \Api\Controller\VeiculoController::class . ':listaInativo');
// 	//Atuza cadastro
$app->put('/veiculo/update/{id}', \Api\Controller\VeiculoController::class . ':atualizaCadastro');
// 	//Inativa um curso
$app->delete('/veiculo/delete/{id}', \Api\Controller\VeiculoController::class . ':delete');






// $app->get('/audit', function (Request $request, Response $response, $args){
// 	$response = $response->withHeader('Content-type', 'application/json');
// 	$response = $response->withJson(Audit::listAudit('veiculo'));
// 	return $response;
// });
