<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario;

class UsuarioController{

	public function cadastrar($data){
		$usuario = new Usuario($data);
		$usuario->status = "ATIVO";
		$usuario->createAt = $_SERVER['REQUEST_TIME'];
		$usuario->save();
	}

	//Lista todos os associados
	public function listaTudo(){
		$usuario = new Usuario();
		return $usuario->select();
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
		$usuario->id = $id;
		return $usuario->update();
	}

}