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
        return $response->withJson($this->pais->makeSelect()->execute()->getAll());

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
        return $response->withJson($this->estado->makeSelect()->execute()->getAll());

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
        return $response->withJson($this->cidade->makeSelect()->execute()->getAll());
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
        return $response->withJson($this->bairro->makeSelect()->execute()->getAll());
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
        $this->pais->configuration['primaryKey'] = 'idPais';
        $this->pais->find($args['id']);
        return $response->withJson((array)$this->pais);
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
        $this->estado->configuration['primaryKey'] ='idEstado';
        $this->estado->find($args['id']);
        return $response->withJson((array)$this->estado);
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
        $this->cidade->configuration['primaryKey'] = 'idCidade';
        $this->cidade->find($args['id']);
        return $response->withJson((array)$this->cidade);
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
        $this->bairro->configuration['primaryKey'] = 'idBairro';
        $this->bairro->find($args['id']);
        return $response->withJson((array)$this->bairro);
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
        $r = $this->bairro->makeSelect()->where('cidadeId='.$args['id'])->execute()->getAll();
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
        return $response->withJson($this->cidade->makeSelect()->where('estadoId='.$args['id'])->execute()->getAll());
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
        return $response->withJson($this->estado->makeSelect->where('paisId='.$args['id'])->execute()->getAll());
    }
    
    public function setBairro($request,$response,$args){
        $post = decode_json($resquest->getBody(),true);
        $this->bairro->load($post);
        return $response->withJson($this->bairro->save());
    }
}
