<?php
namespace Api\Controller; 
use \Api\Model\Entity\Cliente;
use \Api\Model\Entity\CarteiraCliente;
class ClienteController{
    /**
     * Variavel que receberá a instancia de Cliente
     *
     * @var OBJ
     */
    protected $cliente;
    /**
     * Construtor
     */
    public function __construct(){
         $this->cliente = Cliente::getInstance();
         
         $this->carteiraCliente = CarteiraCliente::getInstance();
    }
    /**
     * Lista todos os clientes
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function list($request, $response, $args){
        $user = Auth::_getTokenInfo($args['token']);
        $collection = $this->carteiraCliente->list($user['conteudo']['idUsuario']);
        return $response->withJson($collection->getAll());
    }
    /**
     * Lista de cliente por id
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function listById($request, $response, $args){
        $this->cliente->setPrimaryKey('idCliente');
        $this->cliente->find( (int) $args['id'] );
        return $response->withJson($this->cliente);
    }
    /**
     * Salva um novo cliente
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function save($request, $response, $args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $cliente = Cliente::getInstance();
            $user = Auth::_getTokenInfo($token);
            $post = json_decode($request->getBody(), true);
            $cliente->load($post);
            //$cliente->fkCarteiraCliente = $user['conteudo']['fkCarteiraCliente'];
            $cliente->statusCliente = 'ATIVO';
            $r = $this->cliente->save(true);
            $this->carteiraCliente->idCliente = $r['lastId'];
            $this->carteiraCliente->idUsuario = $user['conteudo']['idUsuario'];
            $this->carteiraCliente->save();
           if($r['flag']){
                return $response->withJson([
                    'message' => 'Cliente salvo com sucesso!',
                    'flag'    => true
                ]);
            }else{
                return $response->withJson([
                    'message' => 'Não foi possivel salvar as informações do cliente',
                    'flag'  => false
                ]);
            }
        }else{
            return $response->withJson([
                'message' => 'Usuario não está logado!',
                'flag'    => false
            ]);
        }
    }
    /**
     * Atualiza as informaçoes do Cliente
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function update($request, $response, $args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $post = json_decode($request->getBody(),true);
            $this->cliente->load($post);
            $this->cliente->setPrimaryKey('idCliente');
            if ($this->cliente->update()){
                return $response->withJson([
                    'message' => 'Informações do cliente atualizadas com sucesso',
                    'flag'    => true
                ]);
            }else{
                return $response->withJson([
                    'message' => 'Não foi possivel atualizar as informações do cliente',
                    'flag'    => false 
                ]);
            }
        }else{
            return $response->withJson([
                'message' => 'Usuario não está logado!',
                'flag'    => false
            ]);
        }
    }
    /**
     * Inativa o cliente 
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function delete($request, $response, $args){
         $token = $args['token'];
         $id = $args['id'];
        if (Auth::_isLoggedIn($token)){
            $this->cliente->idCliente = $args['id'];
            $this->cliente->statusCliente = 'INATIVO';
            $this->cliente->setPrimaryKey('idCliente');
            return $response->withJson($this->cliente->update());
        }else{
            return $response->withJson([
                'message' => 'Usuario não está logado!',
                'flag'    => false
            ]);
        }
    }
}