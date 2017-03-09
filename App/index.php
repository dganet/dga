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
	$app->group('/associado', function() use ($app){
		require_once("route/associadoRoute.php");
	});
	/**
	*	POST
	*/
	// Salva um post
	$app->group('/post', function() use ($app){
		require_once("route/postRoute.php");
	});

	/**
	*	USUARIO
	*/
	$app->group('/usuario', function() use ($app){
		require_once("route/usuarioRoute.php");
	});
	/**
	* VAGA
	*/
	$app->group('/vaga', function() use ($app){
		require_once("route/vagaRoute.php");
	});
	/**
	* PERIODO
	*/
	$app->group('/periodo', function() use ($app){
		require_once("route/periodoRoute.php");
	});

	/**
	* CURSO
	*/
	$app->group('/curso', function() use ($app){
		require_once("route/cursoRoute.php");
	});
	/**
	* OPORTUNIDADE
	*/
	$app->group('/oportunidade', function() use ($app){
		require_once("route/oportunidadeRoute.php");
	});
	/**
	* VEICULO
	*/
	$app->group('/veiculo', function () use ($app){
		require_once("route/veiculoRoute.php");
	});

$app->run();
