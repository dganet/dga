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
		$associado = new Associado($data);
		return $associado->select();
	}

	public function atulizaCadastro($data){
		$associado = new Associado($data);
		$associado->update();
	}

	public function inativar($id){
		$associado = new Associado();
		$associado->id = $id;
		$associado->status = 'INATIVO';
		$associado->update();
	}

}