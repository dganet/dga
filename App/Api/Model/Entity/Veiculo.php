<?php
namespace Api\Model\Entity;

class Veiculo extends \GORM\Model{
	private $id;
	private $associado_id;
	private $numVagas;
	private $periodo;
	private $destino;
	private $nomeLinha;
	private $createAt;
	private $updateAt;
	private $tipo;
	private $status;

	//Contrutor da classe 
	/**
	*	@param Array $data
	*	Constroi um Objeto do tipo Veiculo com as informações contidas no array 
	*/
	public function __construct($data = []){
		isset($data['id']) 				? $this->setId( $data['id']) 			: $this->setId( null);
		isset($data['associado_id']) 	? $this->setAssociado_id( $data['associado_id']) 	: $this->setAssociado_id( null);
		isset($data['numVagas']) 		? $this->setNumVagas( $data['numVagas']) 		: $this->setNumVagas( null);
		isset($data['periodo']) 		? $this->setPeriodo( $data['periodo']) 		: $this->setPeriodo( null);
		isset($data['destino']) 		? $this->setDestino( $data['destino']) 		: $this->setDestino( null);
		isset($data['nomeLinha']) 		? $this->setNomeLinha( $data['nomeLinha']) 	: $this->setNomeLinha( null);
		isset($data['createAt']) 		? $this->setCreateAt( $data['createAt']) 		: $this->setCreateAt( null);
		isset($data['updateAt']) 		? $this->setUpdateAt( $data['updateAt']) 		: $this->setUpdateAt( null);
		isset($data['tipo']) 			? $this->setTipo( $data['tipo']) 			: $this->setTipo( null);
		isset($data['statuc']) 			? $this->setStatus( $data['status']) 		: $this->setStatus( null);	
		$this->class = $this;
	}

	//Metodos Encapsuladores
	public function getId(){
		return $this->id;
	}
	public function getAssociado_id(){
		return $this->associado_id;
	}
	public function getNumVagas(){
		return $this->numVagas;
	}
	public function getPeriodo(){
		return $this->periodo;
	}
	public function getDestino(){
		return $this->destino;
	}
	public function getNomeLinha(){
		return $this->nomeLinha;
	}
	public function getCreateAt(){
		return $this->createAt;
	}
	public function getUpdateAt(){
		return $this->updateAt;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getStatus(){
		return $this->status;
	}
	
	public function setId($value){
		$this->id = $value;
	}
	public function setAssociado_id($value){
		$this->associado_id = $value;
	}
	public function setNumVagas($value){
		$this->numVagas = $value;
	}
	public function setPeriodo($value){
		$this->periodo = $value;
	}
	public function setDestino($value){
		$this->destino = $value;
	}
	public function setNomeLinha($value){
		$this->nomeLinha = $value;
	}
	public function setCreateAt($value){
		$this->createAt = $value;
	}
	public function setUpdateAt($value){
		$this->updateAt = $value;
	}
	public function setTipo($value){
		$this->tipo = $value;
	}
	public function setStatus($value){
		$this->status = $value;
	}

	public function toArray(){
		return array(
			"id" 			=> $this->getId(),
			"associado_id"  => $this->getAssociado_id(),
			"numVagas" 		=> $this->getNumVagas(),
			"periodo" 		=> $this->getPeriodo(),
			"destino" 		=> $this->getDestino(),
			"nomeLinha" 	=> $this->getNomeLinha(),
			"createAt" 		=> $this->getCreateAt(),
			"updateAt" 		=> $this->getUpdateAt(),
			"tipo" 			=> $this->getTipo(),
			"status" 		=> $this->getStatus()
			);
	}
}