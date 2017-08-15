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
unset($app->getContainer()['errorHandler']);
unset($app->getContainer()['phpErrorHandler']);

//Insere as rotas do Associado
require_once("route/associadoRoute.php");
//Insere as rodas do Post
require_once("route/postRoute.php");
//Insere as rotas do Usuario
require_once("route/usuarioRoute.php");
//Insere as rotas do curso
require_once("route/cursoRoute.php");
//Insere as rotas do Oportunidade
require_once("route/oportunidadeRoute.php");
//Insere as rotas do Veiculo
require_once("route/veiculoRoute.php");
//Insere as rotas do universidade
require_once("route/universidadeRoute.php");
//Insere as rotas do curso Faculdade
require_once("route/cursoFaculdadeRoute.php");
//Insere as rotas do Imagem
require_once("route/imagemRoute.php");
//Insere as rotas do ticket
require_once("route/ticketRoute.php");
// 	});
// 	/**
// 	* TESTE
// 	*/
// 	$app->group('/teste', function() use ($app){
// 		require_once("route/testeRoute.php");
// 	});
// 	});
// 	});
// 	/**
// 	* VAGA
// 	*/
// 	$app->group('/vaga', function() use ($app){
// 		require_once("route/vagaRoute.php");
// 	});
// 	/**
// 	* PERIODO
// 	*/
// 	$app->group('/periodo', function() use ($app){
// 		require_once("route/periodoRoute.php");
// 	});

$app->run();
