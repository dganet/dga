<?php
namespace Api\Controller;
use \Api\Model\Entity\Pais, 
\Api\Model\Entity\Estado, 
\Api\Model\Entity\Cidade, 
\Api\Model\Entity\Bairro; 
class EnderecoController{

    private $pais;
    private $estado;
    private $cidade;
    private $bairro;
    
    public function __construct(){
        $this->pais   = Pais::getInstance();
        $this->estado = Estado::getInstance(); 
        $this->cidade = Cidade::getInstance();
        $this->bairro = Bairro::getInstance();
    }
    
    
    /**
     * Retorna todos os paises cadastrados
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getPais($request, $response, $args){
        return $response->withJson($this->pais->all());
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
        $this->estado->recursive = false;
        return $response->withJson($this->estado->all());

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
        return $response->withJson($this->cidade->all());
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
        return $response->withJson($this->bairro->all());
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
        $this->pais->find('where idPais='.$args['id']);
        return $response->withJson($this->pais->toArray());
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
        $this->estado->recursive=true;
        $this->estado->find('where idEstado='.$args['id']);
        return $response->withJson($this->estado->toArray());
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
        $this->cidade->recursive = true;
        $this->cidade->find('where idCidade='.$args['id']);
        return $response->withJson($this->cidade->toArray());
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
        $this->bairro->recursive= true;
        $this->bairro->find('where idBairro='.$args['id']);
        return $response->withJson($this->bairro->toArray());
    }
    /**
     * Retorna todos os bairros de uma determinada cidade(ID)
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
    public function getBairroByCidade($request, $response, $args){
        $r = $this->bairro->select('where cidadeId='.$args['id']);
        if(empty($r)){
            return $response->withJson(['flag' => false, "message" => 'Não há bairros cadastrados para está cidade']);
        }else{
            return $response->withJson($r);
        }
        
    }
    /**
     * Retorna todas as cidades de um determinado estado
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
     public function getCidadeByEstado($request, $response, $args){
        return $response->withJson($this->cidade->select('where estadoId='.$args['id']));
    }
    /**
     * Retorna todos os estados de um determinado pais
     * 
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return Json
     */
     public function getEstadoByPais($request, $response, $args){
        return $response->withJson($this->estado->select('where paisId='.$args['id']));
    }
}