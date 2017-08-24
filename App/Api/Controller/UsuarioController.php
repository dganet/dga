<?php
/**
 * API para controle de Usuários
 * 
 * @version 1.0.0
 * @author Guilherme Brito
 */
namespace Api\Controller;
use \Api\Model\Entity\Usuario, 
	\Api\Auth\Auth;
class UsuarioController{
	/**
	 * Cadastra um Usuario
	 *
	 * @param Mixed $data
	 * @return void
	 */
	public function cadastrar($request, $response, $args){
		if (Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$usuario = Usuario::getInstance();
			$usuario->load($data);
			$usuario->status = "ATIVO";
			return $response->WithJson($usuario->save());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
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
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(), true);
			$usuario = Usuario::getInstance();
			$usuario->load($data);
			return $response->WithJson($usuario->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
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
		if(Auth::_isLoggedIn($args['token'])){
			$usuario = Usuario::getInstance();
			$usuario->status = "INATIVO";
			$usuario->id = $args['id'];
			return $response->WithJson($usuario->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
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
		$auth = new Auth();
		return $response->WithJson($auth->login($data['login'], $data['senha'], false));
	}
	

}