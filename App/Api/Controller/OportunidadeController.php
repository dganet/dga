<?php 
namespace Api\Controller;
use \Api\Model\Entity\Oportunidade, \Api\Auth\Auth;

class OportunidadeController {
	/**
	 * Salva uma nova Oportunidade
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(), true);
			$oportunidade = Oportunidade::getInstance();	
			$oportunidade->status = "ATIVO";
			$oportunidade->load($data);
			return $response->WithJson($oportunidade->save());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todas as oportunidades Ativas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$oportunidade = Oportunidade::getInstance();
		$oportunidade->makeSelect()->where("status='ATIVO'");
		$collection = $oportunidade->execute();
		if ($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Lista oportunidades por ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$oportunidade = Oportunidade::getInstance();
		$oportunidade->makeSelect()->where("status='ATIVO'")->and('id='.$args['id']);
		$collection = $oportunidade->execute();
		if ($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Atualiza as informações de uma oportunidade
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atualizaCadastro($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$oportunidade = Oportunidade::getInstance();
			$oportunidade->load($data);
			return $response->WithJson($oportunidade->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Inativa uma oportunidade
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$oportunidade = Oportunidade::getInstance();
			$data = json_decode($request->getBody(),true);
			$oportunidade->id = $data['id'];
			$oportunidade->status = 'INATIVO';
			return $response->WithJson($oportunidade->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todas as oportunidades inativas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$oportunidade = Oportunidade::getInstance();
		$oportunidade->makeSelect()->where("status='INATIVO'");
		$collection = $oportunidade->execute();
		if ($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}
	}

}