<?php
namespace Api\Controller;
use \Api\Model\Entity\Post, \Api\Controller\AuditController as Audit;

class PostController implements Controller{

	//Cadastra Post
	public function cadastrar($data){
		$post = new Post($data);
		$post->status = "ATIVO";
		$post->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "INSERT", "post");
		return $post->save();
	}
	//Lista todos os POST
	public function listaTudo(){
		$post  = new Post();
		return $post->select(array('where' => array('status' => 'ATIVO')));
		
	}
	//Lista Post por id
	public function listaPorId($id){
		$post = new Post();
		return $post->select(array('where' => array('id' => $id)));
		
	}
	//Lista todos os registros Inativos
	public function listaInativo(){
		$post = new Post();
		return $post->select(array('where' => array('status' => 'INATIVO')));
		
	}
	public function atulizaCadastro($data){
		$post = new Post($data);
		$post->updateAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "post");
		return $post->update();
	}
	
	public function inativar($id){
		$post = new Post();
		$post->updateAt =date('Y-m-d H:i:s');
		$post->id = $id;
		$post->status = 'INATIVO';
		Audit::audit($data, "DELETE", "post");
		return $post->update();
	}

}

