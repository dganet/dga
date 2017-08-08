<?php
/**
 * API para controle de Usuários
 * 
 * @version 1.0.0
 * @author Guilherme Brito
 */
namespace Api\Controller;
use \Api\Model\Entity\Usuario, 
	\Api\Controller\AuditController as Audit;
class UsuarioController{
	/**
	 * Cadastra um Usuario
	 *
	 * @param Mixed $data
	 * @return void
	 */
	public function cadastrar($request, $response, $args){
		$data = json_decode($request->getBody(),true);
		$usuario = Usuario::getInstance();
		$usuario->load($data);
		$usuario->status = "ATIVO";
		$usuario->createAt = date('Y-m-d H:i:s');
		return $response->WithJson($usuario->save());
	}
	/**
	 * Lista todos os usuarios
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaTudo($request,$response,$args){
		$usuario = Usuario::getInstance();
		$usuario->makeSelect()->where("status='ATIVO'");
		$collection = $usuario->execute();
		return $response->WithJson($collection->getAll());
	}
	/**
	 * Lista Usuarios por ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$usuario = Usuario::getInstance();
		$usuario->makeSelect()->where("id=".$args['id']);
		$collection = $usuario->execute();
		return $response->WithJson($collection->getAll());
	}
	/**
	 * Atualiza informações do Usuario
	 * 
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function atulizaCadastro($request, $response, $args){
		$data = json_decode($request->getBody(), true);
		$usuario = Usuario::getInstance();
		$usuario->load($data);
		$usuario->id = $args['id'];
		$usuario->updateAt = date('Y-m-d H:i:s');
		return $response->WithJson($usuario->update());
	}
	/**
	 * Lista todos os Usuarios inativos
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$usuario = Usuario::getInstance();
		$usuario->makeSelect()->where("status='INATIVO'");
		$collection = $usuario->execute();
		return $response->WithJson($collection->getAll());
	}
	/**
	 * Inativa um usuario
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		$usuario = Usuario::getInstance();
		$usuario->status = "INATIVO";
		$usuario->updateAt =date('Y-m-d H:i:s');
		$usuario->id = $args['id'];
		return $response->WithJson($usuario->update());
	}
	/**
	 * Loga um Usuario conforme as informações inseridas no formulário
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */ 
	public function login($request, $response, $args){
		$data = json_decode($request->getBody(), true);
		$usuario = Usuario::getInstance();
		$usuario->makeSelect()->where("email='".$data['login']."'")->and("senha='".md5($data['senha'])."'")->and("status='ATIVO'");
		$collection = $usuario->execute(); 
		if ($collection->exists(0)){
        	return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson(
			[
				'flag' => false,
				'message' => 'Usuário ou senha invalidos'
			]);
		}
	}

}