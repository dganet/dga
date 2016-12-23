<?php
namespace Api\Model\Entity;

class Vaga extends \GORM\Model{
	private $id;
	private $periodo_id;
	private $associado_id;

	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->$id = null
		isset($data['periodo_id']) ? $this->periodo_id = $data['periodo_id'] : $this->$periodo_id = null
		isset($data['associado_id']) ? $this->associado_id = $data['associado_id'] : $this->$associado_id = null
		$this->class = $this;
	}
	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			case 'periodo_id':
				return $this->periodo_id;
				break;
			case 'associado_id':
				return $this->associado_id;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function __set($attr, $value){
		switch (variable) {
			case 'id':
				$this->id = $value;
				break;
			case 'periodo_id':
				$this->periodo_id = $value;
				break;
			case 'associado_id':
				$this->associado_id = $value;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function toAttay(){
		return array(
			'$id' => $this->id
			'$periodo_id' => $this->periodo_id
			'$associado_id' => $this->associado_id
			);
	}

}