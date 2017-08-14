<?php
// namespace Api\Controller;
// use \Api\Model\Entity\Vaga, \Api\Model\Entity\Associado ;

// class VagaController {

// 	public function cadastrar($data){
// 		$vaga = new Vaga($data);
// 		$vaga->status = "ATIVO";
// 		$vaga->vagaCreateAt =date('Y-m-d H:i:s');
// 		$associado = new Associado(array('id' => $data['associado_id'], 'status' => 'APROVACAO'));
// 		$associado->update();
// 		return $vaga->save();
// 	}

// 	//Lista todos os associados
// 	public function listaTudo(){
// 		$vaga = new Vaga();
// 		return $vaga->select(array('where' => array('status' => 'ATIVO')));
// 	}
// 	//Lita vaga pelo ID
// 	public function listaPorId($id){
// 		$vaga = new Vaga();
// 		return $vaga->select(array('where' => array('id' => $id)));
// 	}
// 	//Lista registros inativo
// 	public function listaInativo(){
// 		$vaga = new Vaga();
// 		return $vaga->select(array('where' => array('status' => 'INATIVO')));
// 	}
// 	//Update de cadastro
// 	public function atulizaCadastro($data){
// 		$vaga = new Vaga($data);
// 		$vaga->updateAt =date('Y-m-d H:i:s');
// 		return $vaga->update();
// 	}
// 	//Desativa o cliente
// 	public function inativar($id){
// 		$vaga = new Vaga();
// 		$vaga->status = "INATIVO";
// 		$vaga->updateAt =date('Y-m-d H:i:s');
// 		$vaga->id = $id;
// 		return $vaga->update();
// 	}

// }