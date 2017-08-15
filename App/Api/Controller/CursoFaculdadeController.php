<?php
namespace Api\Controller;
use \Api\Model\Entity\Cursofaculdade, \Api\Auth\Auth;

class CursoFaculdadeController {
	/**
	 * Cria um novo Curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$curso = Cursofaculdade::getInstance();
			$curso->load($data);
			$curso->status = "ATIVO";
			return $response->WithJson($curso->save());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todos os cursos ATIVOS
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$curso = Cursofaculdade::getInstance();
		$curso->makeSelect()->where("status='ATIVO'");
		$collection  = $curso->execute();
		if ($collection->length() != 0){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Lista todos os cursos e quandos associados por curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudoPlus($request, $response, $args){
		$curso = Cursofaculdade::getInstance();
		$associado = \Api\Model\Entity\Associado::getInstance();
		$curso->makeSelect()->where("status='ATIVO'");
		$collection  = $curso->execute();
		$return = [];
		foreach ($collection as $key => $value) {
			$associado->makeSelect()->where("curso=".$value->id);
			$return[$value->nome] = $associado->execute()->getAll();
		}
		return $response->WithJson($return);
	}
	/**
	 * Lista um curso pelo ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$curso = Cursofaculdade::getInstance();
		$curso->makeSelect()->where("status='ATIVO'")->and('id='.$args['id']);
		$collection  = $curso->execute();
		if ($collection->length() != 0){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Atualiza um Curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atulizaCadastro($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$curso = Cursofaculdade::getInstance();
			$curso->load($data);
			return $response->WithJson($curso->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Inativa um curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$curso = Cursofaculdade::getInstance();
			$curso->id = $args['id'];
			$curso->status = 'INATIVO';
			return $response->WithJson($curso->update());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todos os Cursos inativos
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$curso = Cursofaculdade::getInstance();
		$curso->makeSelect()->where("status='INATIVO'");
		$collection  = $curso->execute();
		if ($collection->length() != 0){
			return $response->WithJson($collection->getAll());
		}
	}

}
