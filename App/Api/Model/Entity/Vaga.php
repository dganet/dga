<?php
namespace Api\Model\Entity;

class Vaga extends \GORM\Model{
	private $id;
	private $periodo_id;
	private $associado_id;
	private $usuario_id;
	private $vagavagaCreateAt;
	private $updateAt;
	private $status;

	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->$id = null;
		isset($data['periodo_id']) ? $this->periodo_id = $data['periodo_id'] : $this->periodo_id = null;
		isset($data['associado_id']) ? $this->associado_id = $data['associado_id'] : $this->associado_id = null;
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
		isset($data['vagaCreateAt']) ? $this->vagaCreateAt = $data['vagaCreateAt'] : $this->vagaCreateAt = null;
		isset($data['updateAt']) ? $this->updateAt = $data['updateAt'] : $this->updateAt = null;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null;
		$this->class = $this;
	}
	public function __get($attr){
		return $this->$attr;
	}
	public function __set($attr, $value){
		if($attr == null){

		}else{
			$this->$attr = $value;
		}
		
	}
	public function toArray(){
		$array = array(
			'id' => $this->id,
			'periodo_id' => $this->periodo_id,
			'associado_id' => $this->associado_id,
			'usuario_id' => $this->usuario_id,
			'vagaCreateAt' => $this->vagaCreateAt,
			'updateAt' => $this->updateAt,
			'status'	=>	$this->status
			);
		// faz com que não se retorne valores nulos no array
		$temp = $array;
		foreach ($array as $key => $value) {
			if($value == null){
				unset($temp[$key]);
			}
		}
		return $temp;
	}

}