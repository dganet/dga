<?php
namespace Api\Controller;
use \Api\Model\Entity\Proprietario;
class ProprietarioController{
    /**
     * Variavel que receberá a instancia do model proprietario
     *
     * @var [type]
     */
    protected $proprietario;
    /**
     * Construtor
     */
    public function __construct(){
        $this->proprietario = new Proprietario();
    }
    /**
     * Lista todos os proprietarios
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixidJson
     */
    public function list($request, $response, $args){
        return $response->withJson($this->proprietario->all());
    }
    /**
     * Lista proprietario por ID
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixidJson
     */
    public function listById($request, $response, $args){
        return $response->withJson($this->proprietario->find($args['id']));
    }
    /**
     * Salva as informações do Proprietário
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixidJson
     */
    public function save($request, $response, $args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $post = json_decode($request->getBody());
            $this->$proprietario->load($post);
            if($this->$proprietario->save()){
                return $response->withJson([
                    'message' => 'Proprietário cadastrado com sucesso!',
                    'flag' => true
                ]);
            }else{
                return $response->withJson([
                    'message' => 'Ocorreu um problema ao salvar o proprietário',
                    'flag' => false
                ]);
            }
        }else{
            return $response->withJson([
                'message' => 'Este usuario não tem pemissão para executar esta tarefa ou não está logado',
                'flag'   => false
            ]);
        }
    }
    /**
     * Inativa os Proprietários
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixidJson
     */
    public function delete($request, $responsem ,$args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $id = $args['id'];
            $this->proprietario->idProprietario = $id;
            $this->proprietario->statusProprietario = 'INATIVO';
            if (!$this->proprietario->hasImovel()){
                if($this->proprietario->update()){
                    return $response->withJson([
                        'message' => 'Proprietário deletado com sucesso!',
                        'flag'  => true
                    ]);
                }
            }else{
                return $response->withJson([
                    'message' => 'Não foi possivel remover o Proprietário, provavelmente ele tem imoveis vinculados a ele',
                    'flag'  => false
                ]);
            }
        }
    }
    /**
     * Atualiza as informações do proprietários
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixidJson
     */
    public function update($request, $responsem ,$args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $this->proprietario->load(json_decode($request->getBody()));
            if($this->proprietario->update()){
                return $request->withJson([
                    'message' => 'Proprietario atualizado com sucesso!',
                    'flag' => true
                ]);
            }else{
                return $request->withJson([
                    'message' => 'Ocorreu um problema ao atualizar o proprietário',
                    'flag' => false
                ]);
            }
        }
    }
}