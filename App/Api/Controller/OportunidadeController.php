<?php 
namespace Api\Controller;
use \Api\Model\Entity\Oportunidade;

class OportunidadeController implements Controller {

	public function logar($data){
		$oportunidade = new OportunidadeController();
		$flag =  $oportunidade->select(array('where' => array(
								'AND' => array(
										'cpf' => $data['cpf'],
										'senha' => md5($data['senha']),
										'status' => 'ATIVO'
												)
									)
								)
							);
		if (count($flag)==0){
			$flag['check'] = false;
		}else{
			$flag['check'] = true;
		}
		return $flag;
	}

	// Salva as Informações do oportunidade
	public function cadastrar($data){
		$oportunidade = new OportunidadeController($data);
		$oportunidade->status = "ATIVO";
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		return $oportunidade->save();
	}

	//Lista todos os oportunidade
	public function listaTudo(){
		$oportunidade = new OportunidadeController();
		return $oportunidade->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lista Por Id
	public function listaPorId($id){
		$oportunidade = new OportunidadeController();
		return $oportunidade->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$oportunidade = new OportunidadeController($data);
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		return $oportunidade->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$oportunidade = new OportunidadeController();
		$oportunidade->id = $id;
		$oportunidade->createAt = $_SERVER['REQUEST_TIME'];
		$oportunidade->status = 'INATIVO';
		$oportunidade->update();
	}

	public function test(){
		$oportunidade = new OportunidadeController();
		return $oportunidade->select(array('where' => array('AND' => array('id' => '1', 'nome' => 'guilherme', 'bla' => 11))));
	}


	public function listaInativo(){
		$oportunidade = new OportunidadeController();
		return $oportunidade->select(array('where' => array('status' => 'INATIVO')));
	}

}