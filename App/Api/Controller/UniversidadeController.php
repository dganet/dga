<?php
namespace Api\Controller;
use \Api\Model\Entity\Universidade, \Api\Controller\AuditController as Audit;

class UniversidadeController implements Controller {

	// Salva as Informações do curso
	public function cadastrar($data){
		$curso = new Universidade($data);
		$curso->setStatus("ATIVO");
		$curso->setCreateAt(date('Y-m-d H:i:s'));
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
		$curso->setUpdateAt(date('Y-m-d H:i:s'));
		Audit::audit($data, "UPDATE", "curso");
		return $curso->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$curso = new Universidade();
		$curso->setId($id);
		$curso->setUpdateAt(date('Y-m-d H:i:s'));
		$curso->setStatus("INATIVO");
		Audit::audit($data, "UPDATE", "curso");
		$curso->update();
	}


	public function listaInativo(){
		$curso = new Universidade();
		return $curso->select(array('where' => array('status' => 'INATIVO')));
	}

}
