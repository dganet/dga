<?php
namespace Api\Controller;
use \Api\Model\Entity\Proprietario;
use \Api\Model\Entity\Usuario;
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
        $this->proprietario = Proprietario::getInstance();

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
        return $response->withJson(['message'=>'Nao tem nada aqui =)']);
        //return $response->withJson($this->proprietario->all());
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
        $proprietario = Proprietario::getInstance();
        $proprietario->setPrimaryKey('idProprietario');
        $proprietario->find($args['id']);
        return $response->withJson($proprietario);
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
    public function update($request, $response ,$args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $this->proprietario->load(json_decode($request->getBody(), true));
            $this->proprietario->setPrimaryKey('idProprietario');
            if($this->proprietario->update()){
                return $response->withJson([
                    'message' => 'Proprietario atualizado com sucesso!',
                    'flag' => true
                ]);
            }else{
                return $response->withJson([
                    'message' => 'Ocorreu um problema ao atualizar o proprietário',
                    'flag' => false
                ]);
            }
        }
    }

    public function cpfCheck($request, $response, $args){
        $token = $args['token'];
        if (Auth::_isLoggedIn($token)){
            $post = json_decode($request->getBody(), true);
            $tokeninf = Auth::_getTokenInfo($token);
            $usuario = Usuario::getInstance();
            $usuario->load($tokeninf['conteudo']);
            $imoveis = $usuario->CarteiraImovel->Imovel;
            foreach ($imoveis as $key => $value) {
                $this->proprietario->setPrimaryKey('idProprietario');
                $this->proprietario->find((int) $imoveis[$key]['fkProprietario']);
                if ($this->proprietario->cpfProprietario == $post['cpfProprietario']){
                    return $response->withJson($this->proprietario->toArray());
                    break;
                }
            }
            return $response->withJson(['flag' => false]);
        }else{
            return $response->withJson([
                'flag' => false,
                'message' => 'Não foi possivel verificar o CPF do proprietario pois o usuario aparentemente não está logado e/ou a sessão expirou'
            ]);
        }
    }
}
