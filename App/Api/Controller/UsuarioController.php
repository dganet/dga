<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario;

class UsuarioController implements Controller{

	public function cadastrar($data){
		$usuario = new Usuario($data);
		$usuario->status = "ATIVO";
		$usuario->createAt = $_SERVER['REQUEST_TIME'];
		return $usuario->save();
	}

	//Lista todos os associados
	public function listaTudo(){
		$usuario = new Usuario();
		return $usuario->select();
	}
	//Lita usuario pelo ID
	public function listaPorId($id){
		$usuario = new Usuario();
		return $usuario->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$usuario = new Usuario($data);
		$usuario->updateAt = $_SERVER['REQUEST_TIME'];
		return $usuario->update();
	}
	//Desativa o cliente
	public function inativar($id){
		$usuario = new Usuario();
		$usuario->status = "INATIVO";
		$usuario->updateAt = $_SERVER['REQUEST_TIME'];
		$usuario->id = $id;
		return $usuario->update();
	}
	//Logar 
	public function login($data){
		$usuario = new Usuario();
		$flag =  $usuario->select(array('where' => array(
								'AND' => array(
										'email' => $data['login'],
										'senha' => $data['senha']
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

}