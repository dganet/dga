<?php
namespace Api\Controller;
use \Api\Model\Entity\Veiculo;

class VeiculoController{
	
	/**
	*	@param Array $data
	*	Salva um veiculo, e recebe um array com as informações que serão
	*	salvas no banco de dados
	*/
	public function cadastrar($data){
		$veiculo = new Veiculo($data);

		$veiculo->setCreateAt(date('Y-m-d H:i:s'));
		$veiculo->setStatus('ATIVO');
		return $veiculo->save();
	}
	/**
	*	@param Array $data
	*	Atualiza um cadastro conforme as informações contidas no array $data
	*/
	public function atualizaCadastro($data){
		$veiculo = new Veiculo($data);
		$veiculo->setUpdateAt(data('Y-m-d H:i:s'));
		$veiculo->update();
	}
	// Liusta todos os usuario com status ATIVO
	public function listaTudo(){
		$veiculo = new Veiculo();
		return $veiculo->select(array('WHERE' => array('status' => 'ATIVO')));
	}
	// Lista todos os usuario com o id $id
	public function listaPorId($id){
		$veiculo = new Veiculo();
		return $veiculo->select(array('WHERE' => array ('id' => $id, 'status' => 'ATIVO')));
	}
	// Lista todos os usuario com status INATIVO
	public function listaInativo(){
		$veiculo = new Veiculo();
		return $veiculo->select(array('WHERE' => array ('status' => 'INATIVO')));
	}
	// Inativa um Veiculo
	public function inativar($id){
		$veiculo = new Veiculo();
		$veiculo->setUpdateAt(data('Y-m-d H:i:s'));
		$veiculo->setId($id);
		$veiculo->setStatus('INATIVO');
		return $veiculo->update();
	}
}