<?php
namespace Api\Model\Entity;

class Veiculo extends \GORM\Model{
	
	public $id;
	public $numVagas;
	public $periodo;
	public $destino;
	public $nome;
	public $vagasDisponiveis;
	public $createAt;
	public $updateAt;
	public $tipo;
	public $status;

	public function beforeSave(){
		$universidade = \Api\Model\Entity\Universidade::getInstance();
		foreach ($this->destino as $key => $value) {
			$stack[$key] = $universidade->makeSelect("id,nome")->where("id=".$value['idUniversidade'])->execute(true)[0];
		}
		$this->destino = serialize($stack);
		$this->status = "ATIVO";
		$this->createAt = date('Y-m-d H:i:s');
	}
	public function afterCollection(){
		$this->destino = unserialize($this->destino);
	}
	public function getVagas(){
		$veiculo = \Api\Model\Entity\Veiculo::getInstance();
		$veiculo->makeSelect("destino,vagasDisponiveis");
		return $veiculo->execute(true);
	}
	
}
