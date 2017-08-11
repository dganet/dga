<?php
namespace Api\Controller;
use \Api\Model\Entity\Post, \Api\Controller\AuditController as Audit;
/**
 * Noticia
 */
class PostController{
	/**
	 * Cadastra uma nova noticia
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		$data = json_decode($request->getBody(), true);
		$noticia = Post::getInstance();
		$noticia->load($data);
		$noticia->status = "ATIVO";
		return $response->WithJson($noticia->save());
	}
	/**
	 * Lista todas as noticias em ATIVO
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$noticia = Post::getInstance();
		$noticia->makeSelect()->where("status='ATIVO'");
		$collection = $noticia->execute();
		if($collection->length() > 0 ){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Lista noticias por ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaPorId($request, $response, $args){
		$noticia = Post::getInstance();
		$noticia->makeSelect()->where("status='ATIVO'")->and('id='.$args['id']);
		$collection = $noticia->execute();
		if($collection->length() > 0 ){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Lista noticias INATIVAS
	 *
	 * @param [type] $reuqest
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaInativo($request, $response, $args){
		$noticia = Post::getInstance();
		$noticia->makeSelect()->where("status='INATIVO'");
		$collection = $noticia->execute();
		if($collection->length() > 0 ){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Atualiza as informações de Noticias
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atualizaCadastro($request, $response, $args){
		$data = json_decode($request->getBody(),true);
		$noticia = Post::getInstance();
		$noticia->load($data);
		return $response->WithJson($noticia->update());
	}
	/**
	 * Inativa uma noticia
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function inativar($request, $response, $args){
		$noticia = Post::getInstance();
		$noticia->id = $args['id'];
		$noticia->status = 'INATIVO';
		return $response->WithJson($noticia->update());
	}

}

