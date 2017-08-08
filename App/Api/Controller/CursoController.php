<?php 
namespace Api\Controller;
use \Api\Model\Entity\Curso, \Api\Controller\AuditController as Audit;
/**
 * Oportunidade de Curso
 */
class CursoController {

	/**
	 * Cadastra uma oportunidade 
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		$curso = Curso::getInstance();
		$data = json_decode($resquest->getBody(),true);
		$curso->load($data);
		$curso->status = "ATIVO";
		return $response->WithJson($curso->save());
	}
	/**
	 * Lista todos os cursos
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$curso = Curso::getInstance();
		$curso->makeSelect()->where("status='ATIVO'");
		$collection = $curso->execute();
		if($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Lista todos os cursos por ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$curso = Curso::getInstance();
		$curso->makeSelect()->where("status='ATIVO'")->and("id=".$args['id']);
		$collection = $curso->execute();
		if($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Atualiza as informações do curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atulizaCadastro($request, $response, $args){
		$data = json_decode($request->getBody(), true);
		$curso = Curso::getInstance();
		$curso->load($data);
		return $response->WithJson($curso->update());
	}
	/**
	 * Desativa um curso
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		$curso = Curso::getInstance();
		$curso->id = $args['id'];
		$curso->status = 'INATIVO';
		return $response->WithJson($curso->update());
	}
	/**
	 * Lista cursos Inativos
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$curso = Curso::getInstance();
		$curso->makeSelect()->where("status='INATIVO'");
		$collection = $curso->execute();
		if($collection->length() > 0){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}

}