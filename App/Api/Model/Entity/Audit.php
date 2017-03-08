<?php
namespace Api\Model\Entity;

class Audit extends \GORM\Model{
	private $id;
	private $acao;
	private $usuario_id;
	private $tabela;
	private $createAt;

	//Contrutor da classe 
	/**
	*	@param Array $data
	*	Constroi um Objeto do tipo Audit com as informações contidas no array 
	*/
	public function __construct($data = []){
		isset($data['id']) 				? $this-> setId( $data['id']) 			: $this->setId( null);
		isset($data['acao']) 	? $this-> setAcao( $data['acao']) 	: $this->setAcao( null);
		isset($data['usuario_id']) 		? $this-> setUsuario_id( $data['usuario_id']) 		: $this->setUsuario_id( null);
		isset($data['tabela']) 		? $this-> setTabela( $data['tabela']) 		: $this->setTabela( null);
		isset($data['createAt']) 		? $this-> setCreateAt( $data['createAt']) 		: $this->setCreateAt( null);
		$this->class = $this;
	}

	//Metodos Encapsuladores
	public function getId(){
		return $this->id;
	}
	public function getAcao(){
		return $this->acao;
	}
	public function getUsuario_id(){
		return $this->usuario_id;
	}
	public function getTabela(){
		return $this->tabela;
	}
	public function getCreateAt(){
		return $this->createAt;
	}
	
	
	public function setId($value){
		$this->id = $value;
	}
	public function setAcao($value){
		$this->acao = $value;
	}

	public function setUsuario_id($value){
		$this->usuario_id = $value;
	}
	public function setTabela($value){
		$this->tabela = $value;
	}
	public function setCreateAt($value){
		$this->createAt = $value;
	}
	

	public function toArray(){
		return array(
			"id" 			=> $this->getId(),
			"acao"  		=> $this->getAcao(),
			"usuario_id" 	=> $this->getUsuario_id(),
			"tabela" 		=> $this->getTabela(),
			"createAt"		=> $this->getCreateAt()
			);
	}

}