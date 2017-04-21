<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario,\Api\Model\Entity\CarteiraImovel,\Api\Model\Entity\CarteiraCliente;
class UsuarioController {
    /**
     * Lista todos os Usuarios
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function list($request,$response,$args){
        $usuario = new Usuario();
        return $response->withJson($usuario->all());
    }
    /**
     * Lista usuarios por id
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function listById($request,$response,$args){
        $id = $args['id'];
        $usuario = new Usuario();
        return $response->withJson($usuario->find($id)->toArray());
    }
    /**
     * Salva um Usuario e cria sua agenda de telefones
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function save($request, $response, $args){
        $post = json_decode($request->getBody());
        $usuario = new Usuario($post);
        $usuario->createAtUsuario = date("Y-m-d H:i:s");
        $usuario->fkPermissao = 1;
        $imovel = new CarteiraImovel();
        $cliente = new CarteiraCliente();
        $imovel->nomeCarteiraImovel = "Carteira de Imovel de ".$usuario->nomeUsuario." ".$usuario->sobrenomeUsuario;
        $cliente->nomeCarteiraCliente = "Carteira de Cliente de ".$usuario->nomeUsuario." ".$usuario->sobrenomeUsuario;
        $usuario->fkCarteiraImovel = $imovel->save(true);
        $usuario->fkCarteiraCliente = $cliente->save(true);
        if ($usuario->save()){
            return $response->withJson(['message' => 'Usuario cadastrado com sucesso!', flag => true]);
        }else{
            return $response->withJson(['message' => 'Ocorreu um problema ao cadastrar o usuário!', flag => false]);
        }
    }
    /**
     * Atualiza as informações de um usuário já existente
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function update($request, $response, $args){
        $id = $args['id'];
        $post = json_decode($request->getbody());
        $usuario = new Usuario($post);
        if ($usuario->update()){
            return $response->withJson(['message' => 'Usuario atualizado com sucesso!', flag => true]);
        }else{
            return $response->withJson(['message' => 'Ocorreu um problema na atualização do usuario', flag => false]);
        }
    }
    /**
     * Inativa um usuario
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function delete($request, $response, $args){
        $id = $args['id'];
        $usuario = new Usuario();
        $usuario->idUsuario = $id;
        $usuario->status = 'INATIVO';
        if($usuario->update()){
            return $response->withJson(['message' => 'Usuario removido com sucesso!', flag => true]);
        }else{
            return $response->withJson(['message' => 'Ocorreu um problema na remoção do usuario', flag => false]);
        }   
    }
}