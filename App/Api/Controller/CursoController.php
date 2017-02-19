<?php 
namespace Api\Controller;
use \Api\Model\Entity\Curso;

class CursoController implements Controller {

	public function logar($data){
		$curso = new Curso();
		$flag =  $curso->select(array('where' => array(
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

	// Salva as Informações do curso
	public function cadastrar($data){
		$curso = new Curso($data);
		$curso->status = "ATIVO";
		$curso->createAt = $_SERVER['REQUEST_TIME'];
		return $curso->save();
	}

	//Lista todos os curso
	public function listaTudo(){
		$curso = new Curso();
		return $curso->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lista Por Id
	public function listaPorId($id){
		$curso = new Curso();
		return $curso->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$curso = new Curso($data);
		$curso->createAt = $_SERVER['REQUEST_TIME'];
		return $curso->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$curso = new Curso();
		$curso->id = $id;
		$curso->createAt = $_SERVER['REQUEST_TIME'];
		$curso->status = 'INATIVO';
		$curso->update();
	}

	public function test(){
		$curso = new Curso();
		return $curso->select(array('where' => array('AND' => array('id' => '1', 'nome' => 'guilherme', 'bla' => 11))));
	}


	public function listaInativo(){
		$curso = new Curso();
		return $curso->select(array('where' => array('status' => 'INATIVO')));
	}

}