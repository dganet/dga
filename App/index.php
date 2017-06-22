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
/**
 * USUARIOS
 */
//Lista todos os usuarios
$app->get('/usuario/list', \Api\Controller\UsuarioController::class . ':list');
//Lista os usuarios atraves do ID
$app->get('/usuario/list/{id}', \Api\Controller\UsuarioController::class . ':listById');
//Confirma o email do usuairo
$app->get('/usuario/confirm/{creci}', \Api\Controller\UsuarioController::class . ':confirm');
//Salva um novo usuario
$app->post('/usuario/save', \Api\Controller\UsuarioController::class . ':save');
//Atualiza as informações do usuario
$app->put('/usuario/update/{id}/{token}', \Api\Controller\UsuarioController::class . ':update');
//Inativa um Usuario
$app->delete('/usuario/delete/{id}/{token}', \Api\Controller\UsuarioController::class . ':delete');
//Vincula a conta do facebook com a conta do imobiliar
$app->put('/usuario/migrate', \Api\Controller\UsuarioController::class . ':migrate');
//FIM USUARIOS
/**
 * AUTENTICACAO
 */
//Loga usuario
$app->post('/usuario/login', \Api\Controller\AuthController::class . ':logar');
//Loga Com Facebook
$app->post('/usuario/login/facebook', \Api\Controller\AuthController::class . ':facebookLogin');
//Verifica o usuario Logado
$app->get('/usuario/login/{token}', \Api\Controller\AuthController::class . ':checkLogin');
//Esqueci a senha
$app->post('/usuario/login/forgot', \Api\Controller\AuthController::class . ':forgotPass');
//FIM AUTENTICACAO
/**
 * IMOVEIS
 */
//FIM IMOVEIS
/**
 * PROPRIETARIO
 */
//Lista todos os proprietario
$app->get('/proprietario/list', \Api\Controller\ProprietarioController::class . ':list');
//Lista os proprietarios atraves do ID
$app->get('/proprietario/list/{id}', \Api\Controller\ProprietarioController::class . ':listById');
//Salva um novo proprietario
$app->post('/proprietario/save/{token}', \Api\Controller\ProprietarioController::class . ':save');
//Atualiza as informações do proprietario
$app->put('/proprietario/update/{id}/{token}', \Api\Controller\ProprietarioController::class . ':update');
//Inativa um proprietario
$app->delete('/proprietario/delete/{id}/{token}', \Api\Controller\ProprietarioController::class . ':delete');
//Verifica se o proprietario foi inserido na casteira de cliente do usuario
$app->post('/proprietario/cpf/{token}', \Api\Controller\ProprietarioController::class . ':cpfCheck');
//FIM Proprietario
/**
 * CLIENTE
 */
//Lista todos clientes de um usuario
$app->get('/cliente/list/{token}', \Api\Controller\ClienteController::class . ':list');
//Lista cliente atraves do Id
$app->get('/cliente/listId/{id}', \Api\Controller\ClienteController::class . ':listById');
//Salva um novo cliente
$app->post('/cliente/save/{token}', \Api\Controller\ClienteController::class . ':save');
// Atualiza as informações do cliente
$app->put('/cliente/update/{id}/{token}', \Api\Controller\ClienteController::class . ':update');
//Inativa o cliente
$app->get('/cliente/delete/{id}/{token}', \Api\Controller\ClienteController::class . ':delete');
// FIM CLIENTE
/**
 * IMAGEM
 */
$app->put('/imagem', \Api\Controller\ImageController::class . ':main');
//FIM IMAGEM
/**
 * ENDERECOS
 */
//Retorna os paises cadastrados
$app->get('/pais', \Api\Controller\EnderecoController::class . ':getPais');
//Retorna os Estados cadastrados
$app->get('/estado', \Api\Controller\EnderecoController::class . ':getEstado');
//Retorna as Cidades Cadastradas 
$app->get('/cidade', \Api\Controller\EnderecoController::class . ':getCidade');
//Retorna os bairros cadastrados
$app->get('/bairro', \Api\Controller\EnderecoController::class . ':getBairro');
//Retorna Pais por id
$app->get('/pais/{id}', \Api\Controller\EnderecoController::class . ':getPaisById');
//Retorna os Estados por id
$app->get('/estado/{id}', \Api\Controller\EnderecoController::class . ':getEstadoById');
//Retorna as Cidades por id 
$app->get('/cidade/{id}', \Api\Controller\EnderecoController::class . ':getCidadeById');
//Retorna os bairros por id
$app->get('/bairro/{id}', \Api\Controller\EnderecoController::class . ':getBairroById');
//Retorna um todos os bairros de uma cidade (ID referente a cidade)
$app->get('/bairro/cidade/{id}', \Api\Controller\EnderecoController::class . ':getBairroByCidade');
//Retorna um todas as cidades de um estado (ID referente a estado)
$app->get('/cidade/estado/{id}', \Api\Controller\EnderecoController::class . ':getCidadeByEstado');
//Retorna um todos os estados de um pais (ID referente a pais)
$app->get('/estado/pais/{id}', \Api\Controller\EnderecoController::class . ':getEstadoByPais');
//Insere Novo bairro
$app->post('/bairro/save', \Api\Controller\EnderecoController::class . ':setBairro');
/**
 * TESTE
 */
$app->get('/teste', \Api\Test\Teste::class . ':main');
//##################################################################
$app->run();