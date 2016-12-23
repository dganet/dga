<?php
namespace Api\Model\Entity;

class Periodo extends \GORM\Model{
	private $id;
	private $linha;
	private $dataInicio;
	private $dataFinal;
	private $qtasVagas;
	private $status;
	private $createAt;
	private $updateAt;
	private $status;
	private $usuario_id;


	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->id = null ;
		isset($data['linha']) ? $this->linha = $data['linha'] : $this->linha = null ;
		isset($data['dataInicio']) ? $this->dataInicio = $data['dataInicio'] : $this->dataInicio = null ;
		isset($data['dataFinal']) ? $this->dataFinal = $data['dataFinal'] : $this->dataFinal = null ;
		isset($data['qtasVagas']) ? $this->qtasVagas = $data['qtasVagas'] : $this->qtasVagas = null ;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null ;
		isset($data['createAt']) ? $this->createAt = $data['createAt'] : $this->createAt = null ;
		isset($data['updateAt']) ? $this->updateAt = $data['updateAt'] : $this->updateAt = null ;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null ;
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null ;
		$this->class = $this;
	}

	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			case 'linha':
				return $this->linha;
				break;
			case 'dataInicio':
				return $this->dataInicio;
				break;
			case 'dataFinal':
				return $this->dataFinal;
				break;
			case 'qtasVagas':
				return $this->qtasVagas;
				break;
			case 'status':
				return $this->status;
				break;
			case 'createAt':
				return $this->createAt;
				break;
			case 'updateAt':
				return $this->updateAt;
				break;
			case 'status':
				return $this->status;
				break;
			case 'usuario_id':
				return $this->usuario_id;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
				$this->id = $value;
				break;
			case 'linha':
				$this->linha = $value;
				break;
			case 'dataInicio':
				$this->dataInicio = $value;
				break;
			case 'dataFinal':
				$this->dataFinal = $value;
				break;
			case 'qtasVagas':
				$this->qtasVagas = $value;
				break;
			case 'status':
				$this->status = $value;
				break;
			case 'createAt':
				$this->createAt = $value;
				break;
			case 'updateAt':
				$this->updateAt = $value;
				break;
			case 'status':
				$this->status = $value;
				break;
			case 'usuario_id':
				$this->usuario_id = $value;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function toArray(){
		return array(
			'id' => $this->id,
			'linha' => $this->linha,
			'dataInicio' => $this->dataInicio,
			'dataFinal' => $this->dataFinal,
			'qtasVagas' => $this->qtasVagas,
			'status' => $this->status,
			'createAt' => $this->createAt,
			'updateAt' => $this->updateAt,
			'status' => $this->status,
			'usuario_id' => $this->usuario_id
			);
	}
}