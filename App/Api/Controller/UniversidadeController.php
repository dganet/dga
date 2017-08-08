<?php
namespace Api\Controller;
use \Api\Model\Entity\Universidade, \Api\Controller\AuditController as Audit;

class UniversidadeController {

	/**
	 * Cadastra nova Universidade
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		$data = json_decode($request->getBody(),true);
		$curso = Universidade::getInstance();
		$curso->load($data);
		$curso->status = "ATIVO";
		return $response->WithJson($curso->save());
	}
	/**
	 * Lista todas as universidades Ativas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$curso = Universidade::getInstance();
		$curso->makeSelect()->where("status='ATIVO'");
		$collection = $curso->execute();
		if ($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Lista universidades por ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$curso = Universidade::getInstance();
		$curso->makeSelect()->where("status='ATIVO'")->and("id=".$args['id']);
		$collection = $curso->execute();
		if ($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 *Atualiza informações das universidades
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function atulizaCadastro($request, $response, $args){
		$data = json_decode($request->getBody(),true);
		$curso = Universidade::getInstance();
		$curso->load($data);
		$curso->status = "ATIVO";
		return $response->WithJson($curso->update());
	}
	/**
	 * Inativa uma universidade
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		$curso = Universidade::getInstance();
		$curso->id = $args['id'];
		$curso->status = "INATIVO";
		return $response->WithJson($curso->update());
	}
	/**
	 * Lista todas as universidades inativas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixes $args
	 * @return Json
	 */
	public function listaInativo(){
			$curso = Universidade::getInstance();
		$curso->makeSelect()->where("status='INATIVO");
		$collection = $curso->execute();
		if ($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}

}
