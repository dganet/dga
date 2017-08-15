<?php
namespace Api\Controller;
use \Api\Model\Entity\Veiculo, \Api\Auth\Auth;

class VeiculoController{
	/**
	 * Salva um novo veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$veiculo = Veiculo::getInstance();
			$veiculo->load($data);
			$veiculo->status = 'ATIVO';
			return $response->WithJson($veiculo->save());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Atualiza as informações do Veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atualizaCadastro($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$veiculo = Veiculo::getInstance();
			$data = json_decode($request->getBody,true);
			$veiculo->find($args['id']);
			if($veiculo->numVagas > $data['numVagas']){
				return $response->WithJson(
					[
						'flag' => false,
						'message' => 'O numero de vagas não permitido'
					]
				);
			}else{
				$veiculo->load($data);
				return $response->WithJson($veiculo->update());
				return true;
			}
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todos os veiculos ATIVOS
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Lista um veiculo pelo ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'")->and("id=".$args['id']);
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Lista todos os veiculos com status INATIVO
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='INATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Inativa um Veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$veiculo = Veiculo::getInstance();
			$veiculo->id = $args['id'];
			$veiculo->status = 'INATIVO';
			return $response->WithJson($veiculo->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
}
