<?php 
namespace Api\Controller;
use \Api\Model\Entity\Oportunidade;

class OportunidadeController implements Controller {

	// Salva as Informações do oportunidade
	public function cadastrar($data){
		$oportunidade = new Oportunidade	$oportunidade->status = "ATIVO";
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		return $oportunidade->save();
	}

	//Lista todos os oportunidade
	public function listaTudo(){
		$oportunidade = new Oportunidade();
		return $oportunidade->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lista Por Id
	public function listaPorId($id){
		$oportunidade = new Oportunidade();
		return $oportunidade->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$oportunidade = new Oportunidade($data);
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		return $oportunidade->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$oportunidade = new Oportunidade();
		$oportunidade->id = $id;
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		$oportunidade->status = 'INATIVO';
		$oportunidade->update();
	}

	public function test(){
		$oportunidade = new Oportunidade();
		return $oportunidade->select(array('where' => array('AND' => array('id' => '1', 'nome' => 'guilherme', 'bla' => 11))));
	}


	public function listaInativo(){
		$oportunidade = new Oportunidade();
		return $oportunidade->select(array('where' => array('status' => 'INATIVO')));
	}

}