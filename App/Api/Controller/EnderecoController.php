<?php
namespace Api\Controller;
use \Api\Model\Entity\Pais, 
\Api\Model\Entity\Estado, 
\Api\Model\Entity\Cidade, 
\Api\Model\Entity\Bairro; 
class EnderecoController{

    /**
     * Retorna todos os paises cadastrados
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getPais($request, $response, $args){
        $pais = new Pais();
        return $response->withJson($pais->all());
    }
    /**
     * Retorna todos os estados cadastrados
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
     public function getEstado($request, $response, $args){
        $estado = new Estado();
        $estado->recursive = false;
        return $response->withJson($estado->all());

    }
    /**
     * Retorna todas as Cidades Cadastradas
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
     public function getCidade($request, $response, $args){
        $cidade = Cidade::getInstance();
        return $response->withJson($cidade->all());
    }
    /**
     * Retorna todos os Bairros cadastrados
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
     public function getBairro($request, $response, $args){
        $bairro = new Bairro();
        return $response->withJson($bairro->all());
    }
    /**
     * Retona o Pais conforme o id
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getPaisById($request, $response, $args){
        $pais = Pais::getInstance();
        $pais->find('where id='.$args['id']);
        return $response->withJson($pais->toArray());
    }
    /**
     * Retorna o Estado conforme o ID em modo cascata
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getEstadoById($request, $response, $args){
        $estado = Estado::getInstance();
        $estado->recursive=true;
        $estado->find('where id='.$args['id']);
        return $response->withJson($estado->toArray());
    }
    /**
     * Retorna a cidade conforme o ID em modo cascata
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getCidadeById($request, $response, $args){
        $cidade = Cidade::getInstance();
        $cidade->recursive = true;
        $cidade->find('where id='.$args['id']);
        return $response->withJson($cidade->toArray());
    }
    /**
     * Retorna o bairro conforme o ID em modo cascata
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getBairroById($request, $response, $args){
        $bairro = Bairro::getInstance();
        $bairro->recursive= true;
        $bairro->find('where id='.$args['id']);
        return $response->withJson($bairro->toArray());
    }
}