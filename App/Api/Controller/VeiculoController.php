<?php
namespace Api\Controller;
use \Api\Model\Entity\Veiculo, \Api\Controller\AuditController as Audit;

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
		Audit::audit($data, "INSERT", "veiculo");
		return $veiculo->save();
	}

	/**
	*	@param Array $data
	*	Atualiza um cadastro conforme as informações contidas no array $data
	*/
	public function atualizaCadastro($data){
		$veiculo = new Veiculo();
		$vagas = $this->associadoXVeiculo($data['id']);
		if($data['numVagas'] < $vagas){
			return false;
		}else{
			$veiculo = new Veiculo($data);
			$veiculo->setUpdateAt(date('Y-m-d H:i:s'));
			Audit::audit($data, "UPDATE", "veiculo");
			$veiculo->update();
			return true;
		}
	}
	// Liusta todos os usuario com status ATIVO
	public function listaTudo(){
		$veiculo = new Veiculo();
		return $veiculo->select(array('where' => array('status' => 'ATIVO')));

	}
	// Lista todos os usuario com o id $id
	public function listaPorId($id){
		$veiculo = new Veiculo();
		return $veiculo->select(array('where' => array('id' => $id)));
	}
	// Lista todos os usuario com status INATIVO
	public function listaInativo(){
		$veiculo = new Veiculo();
		return $veiculo->select(array('WHERE' => array('status' => 'INATIVO')));
	}
	// Inativa um Veiculo
	public function inativar($id){
		$veiculo = new Veiculo();
		$veiculo->setUpdateAt(data('Y-m-d H:i:s'));
		$veiculo->setId($id);
		$veiculo->setStatus('INATIVO');
		Audit::audit($data, "DELETE", "veiculo");
		return $veiculo->update();
	}
	/**
	 * Retorna a quantidade de associados que tem em um determinado veiculo
	 * @param  Int $id Id do veiculo a ser consultado
	 * @return Int Quantidade de vagas ocupadas no veiculo
	 */
	public function associadoXVeiculo($id){
		$associado = new \Api\Model\Entity\Associado();
		$veiculo = $associado->select(
			array(
				'select' => 'status',
				'where' =>
					array(
						'AND' =>
							array(
								'veiculo_id' => $id,
								'status'		 => 'ATIVO'
							))));
		return count($veiculo);
	}
}
