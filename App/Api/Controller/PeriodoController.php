<?php 
namespace Api\Controller;
use \Api\Model\Entity\Periodo;

class PeriodoController implements Controller {

	// Salva as Informações do Associado
	public function cadastrar($data){
		$periodo = new Periodo($data);
		$periodo->createAt = $_SERVER['REQUEST_TIME'];
		$periodo->status = "ATIVO";
		return $periodo->save();
	}

	//Lista todos os periodos
	public function listaTudo(){
		$periodo = new Periodo();
		return $periodo->select();
	}
	//Lista Por Id
	public function listaPorId($id){
		$periodo = new Periodo();
		return $periodo->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$periodo = new Periodo($data);
		$periodo->createAt = $_SERVER['REQUEST_TIME'];
		$periodo->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$periodo = new Periodo();
		$periodo->id = $id;
		$periodo->createAt = $_SERVER['REQUEST_TIME'];
		$periodo->status = 'INATIVO';
		$periodo->update();
	}

}