<?php
namespace Api\Controller; 
use \Api\Model\Entity\Cliente;
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
        $this->cliente = new Cliente();
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
        $token = $args['token'];
        $user = Auth::_getTokenInfo($token);
        return $response->withJson($this->cliente->select('where fkCarteiraCliente='.$user['conteudo']['fkCarteiraCliente']));
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
        return $response->withJson($this->cliente->select( (int) $args['id'] ));
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
            $user = Auth::_getTokenInfo($token);
            $post = json_decode($request->getBody(), true);
            $this->cliente = $this->cliente->load($post);
            $this->cliente->fkCarteiraCliente = $user['conteudo']['fkCarteiraCliente'];
            $this->cliente->createAt = date("Y-m-d H:i:s");
           if($this->cliente->save()){
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
            $this->cliente->idCliente = $args['id']; 
            $this->cliente->updateAt = date("Y-m-d H:i:s");
            if ($this->cliente->update()){
                return $response->withJson([
                    'message' => 'Informações do cliente atualizadas com sucesso',
                    'flag'    => true
                ]);
            }else{
                return $response-withJson([
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
        if (Auth::_isLoggedIn($token)){
            $this->cliente->idCliente = $args['id'];
            $this->cliente->statusCliente = 'INATIVO'; 
            if ($this->cliente->delete()){
                return $response->withJson([
                    'message' => 'Cliente removido com sucesso!',
                    'flag' => true
                ]);
            }else{

            }
        }else{
            return $response->withJson([
                'message' => 'Usuario não está logado!',
                'flag'    => false
            ]);
        }
    }
}