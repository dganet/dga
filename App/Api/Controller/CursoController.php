<?php 
namespace Api\Controller;
use \Api\Model\Entity\Curso, \Api\Controller\AuditController as Audit;

class CursoController {

	// Salva as Informações do curso
	public function cadastrar($data){
		$curso = new Curso($data);
		$curso->status = "ATIVO";
		$curso->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "INSERT", "curso");
		return $curso->save();
	}
	/**
	 * Undocumented function
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
		return $response->WithJson($collection->getAll());
	}
	//Lista Por Id
	public function listaPorId($id){
		$curso = new Curso();
		return $curso->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$curso = new Curso($data);
		$curso->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "curso");
		return $curso->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$curso = new Curso();
		$curso->id = $id;
		$curso->createAt =date('Y-m-d H:i:s');
		$curso->status = 'INATIVO';
		Audit::audit($data, "UPDATE", "curso");
		$curso->update();
	}


	public function listaInativo(){
		$curso = new Curso();
		return $curso->select(array('where' => array('status' => 'INATIVO')));
	}

}