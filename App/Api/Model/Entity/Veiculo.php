<?php
namespace Api\Model\Entity;

class Veiculo extends \GORM\Model{
	
	public $id;
	public $associado_id;
	public $numVagas;
	public $periodo;
	public $destino;
	public $nomeLinha;
	public $createAt;
	public $updateAt;
	public $tipo;
	public $status;

	public function beforeSave(){
		$this->destino = serialize($this->destino);
		$this->status = "ATIVO";
		$this->createAt = date('Y-m-d H:i:s');
	}
	public function afterSelect(){
		$this->destino = unserialize($this->destino);
	}
	public function getVagas(){
		$associado = \Api\Model\Entity\Associado::getInstance();
		$associado->makeSelect()->where('veiculo_id='.$this->id);
		$collection = $associado->execute();
		return $collection->length() - $this->numVagas ;
	}
	
}
