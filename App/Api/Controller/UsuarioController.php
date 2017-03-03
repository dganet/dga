<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario, \Api\Controller\AuditController as Audit;

class UsuarioController implements Controller{

	public function cadastrar($data){
		$usuario = new Usuario($data);
		$usuario->status = "ATIVO";
		$usuario->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "INSERT", "usuario");
		return $usuario->save();
	}

	//Lista todos os associados
	public function listaTudo(){
		$usuario = new Usuario();
		return $usuario->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lita usuario pelo ID
	public function listaPorId($id){
		$usuario = new Usuario();
		return $usuario->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$usuario = new Usuario($data);
		$usuario->updateAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "usuario");
		return $usuario->update();
	}
	//Lista registros inativos
	public function listaInativo(){
		$usuario = new Usuario();
		return $usuario->select(array('where' => array('status' => 'INATIVO')));
	}
	//Desativa o cliente
	public function inativar($id){
		$usuario = new Usuario();
		$usuario->status = "INATIVO";
		$usuario->updateAt =date('Y-m-d H:i:s');
		$usuario->id = $id;
		Audit::audit($data, "UPDATE", "usuario");
		return $usuario->update();
	}
	//Logar 
	public function login($data){
		$usuario = new Usuario();
		$flag =  $usuario->select(array('where' => array(
								'AND' => array(
										'email'  => $data['login'],
										'senha'  => md5($data['senha']),
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

}