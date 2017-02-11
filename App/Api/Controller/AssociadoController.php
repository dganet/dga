<?php 
namespace Api\Controller;
use \Api\Model\Entity\Associado;

class AssociadoController implements Controller {

	// Salva as Informações do Associado
	public function cadastrar($data){
		$associado = new Associado();
		$associado->createAt = $_SERVER['REQUEST_TIME'];
		return $associado->save();
	}

	//Lista todos os associados
	public function listaTudo(){
		$associado = new Associado();
		return $associado->select();
	}
	//Lista Por Id
	public function listaPorId($id){
		$associado = new Associado();
		return $associado->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$associado = new Associado($data);
		$associado->createAt = $_SERVER['REQUEST_TIME'];
		return $associado->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$associado = new Associado();
		$associado->id = $id;
		$associado->createAt = $_SERVER['REQUEST_TIME'];
		$associado->status = 'INATIVO';
		$associado->update();
	}

}