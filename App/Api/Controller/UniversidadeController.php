<?php
namespace Api\Controller;
use \Api\Model\Entity\Universidade, \Api\Controller\AuditController as Audit;

class UniversidadeController implements Controller {

	// Salva as Informações do curso
	public function cadastrar($data){
		$curso = new Universidade($data);
		$curso->status = "ATIVO";
		$curso->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "INSERT", "curso");
		return $curso->save();
	}

	//Lista todos os curso
	public function listaTudo(){
		$curso = new Universidade();
		return $curso->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lista Por Id
	public function listaPorId($id){
		$curso = new Universidade();
		return $curso->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$curso = new Universidade($data);
		$curso->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "curso");
		return $curso->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$curso = new Universidade();
		$curso->id = $id;
		$curso->createAt =date('Y-m-d H:i:s');
		$curso->status = 'INATIVO';
		Audit::audit($data, "UPDATE", "curso");
		$curso->update();
	}


	public function listaInativo(){
		$curso = new Universidade();
		return $curso->select(array('where' => array('status' => 'INATIVO')));
	}

}
