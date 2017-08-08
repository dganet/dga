<?php
namespace Api\Controller;
use \Api\Model\Entity\Veiculo, \Api\Controller\AuditController as Audit;

class VeiculoController{

	/**
	*	@param Array $data
	*	Salva um veiculo, e recebe um array com as informações que serão
	*	salvas no banco de dados
	*/
	public function cadastrar($request, $response, $args){
		$data = json_decode($request->getBody(),true);
		$veiculo = Veiculo::getInstance();
		$veiculo->load($data);
		$veiculo->status = 'ATIVO';
		return $response->WithJson($veiculo->save());
	}
	/**
	*	@param Array $data
	*	Atualiza um cadastro conforme as informações contidas no array $data
	*/
	public function atualizaCadastro($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$data = json_decode($request->getBody,true);
		$veiculo->find($args['id']);

		if($veiculo->numVagas > $data['numVagas']){
			return $response->WithJson(
				[
					'flag' => false,
					'message' => 'O numero de vagas não permitido'
				]
			);
		}else{
			$veiculo->load($data);
			return $response->WithJson($veiculo->update());
			return true;
		}
	}
	// Liusta todos os usuario com status ATIVO
	public function listaTudo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	// Lista todos os usuario com o id $id
	public function listaPorId($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'")->and("id=".$args['id']);
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	// Lista todos os usuario com status INATIVO
	public function listaInativo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='INATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	// Inativa um Veiculo
	public function inativar($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->id = $args['id'];
		$veiculo->status = 'INATIVO';
		return $response->WithJson($veiculo->update());
	}
}
