<?php
namespace Api\Controller;
use \Api\Model\Entity\Post;

class PostController implements Controller{

	//Cadastra Post
	public function cadastrar($data){
		$post = new Post($data);
		$usuario->status = "ATIVO";
		$usuario->createAt = $_SERVER['REQUEST_TIME'];
		return $post->save();
	}
	//Lista todos os POST
	public function listaTudo(){
		$post = new Post();
		return $post->select();
	}
	public function listaPorId($id){
		$post = new Post();
		return $post->select(array('where' => array('id' => $id)));
	}
	public function atulizaCadastro($data){
		$post = new Post($data);
		$post->updateAt = $_SERVER['REQUEST_TIME'];
		return $post->update();
	}
	
	public function inativar($id){
		$post = new Post();
		$post->updateAt = $_SERVER['REQUEST_TIME'];
		$post->id = $id;
		$post->status = 'INATIVO';
		return $post->update();
	}

}

