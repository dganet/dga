<?php 
namespace Api\Controller;
use \Api\Model\Entity\Associado;

class AssociadoController {

	// Salva as Informações do Associado
	public function cadastrar($data){
		$associado = new Associado($data);
		$associado->createAt = $_SERVER['REQUEST_TIME'];
		$associado->status = "ATIVO";
		return $associado->save();
	}

	//Lista todos os associados
	public function listaTudo(){
		$associado = new Associado();
		return $associado->select();
	}
	//Lista Por Id
	public function listaId($id){
		$associado = new Associado();
		return $associado->select(array('id' => $id));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$associado = new Associado($data);
		$associado->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$associado = new Associado();
		$associado->id = $id;
		$associado->status = 'INATIVO';
		$associado->update();
	}

}