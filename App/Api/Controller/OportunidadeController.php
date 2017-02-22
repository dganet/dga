<?php 
namespace Api\Controller;
use \Api\Model\Entity\Oportunidade;

class OportunidadeController implements Controller {

	// Salva as Informações do oportunidade
	public function cadastrar($data){
		$oportunidade = new Oportunidade($data);	
		$oportunidade->status = "ATIVO";
		$oportunidade->createAt =date('Y-m-d H:i:s');
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
		$oportunidade->createAt =date('Y-m-d H:i:s');
		return $oportunidade->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$oportunidade = new Oportunidade();
		$oportunidade->id = $id;
		$oportunidade->updateAt =date('Y-m-d H:i:s');
		$oportunidade->status = 'INATIVO';
		$oportunidade->update();
	}


	public function listaInativo(){
		$oportunidade = new Oportunidade();
		return $oportunidade->select(array('where' => array('status' => 'INATIVO')));
	}

}