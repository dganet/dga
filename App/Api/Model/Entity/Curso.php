<?php
namespace Api\Model\Entity;

class Curso extends \GORM\Model {
	private $id;
	private $titulo;
	private $descricao;
	private $createAt;
	private $updateAt;
	private $status;

	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->id = null;
		isset($data['titulo']) ? $this->titulo = $data['titulo'] : $this->titulo = null;
		isset($data['descricao']) ? $this->descricao = $data['descricao'] : $this->descricao = null;
		isset($data['createAt']) ? $this->createAt = $data['createAt'] : $this->createAt = null;
		isset($data['updateAt']) ? $this->updateAt = $data['updateAt'] : $this->updateAt = null;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null;
		$this->class = $this;
	}
	public function __get($att){
		switch ($att) {
			case 'id':
				return $this->id;
				break;
			case 'descricao':
				return $this->descricao;
				break;
			case 'titulo':
				return $this->titulo;
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
			
			default:
				# code...
				break;
		}

	}
	public function __set($att, $value){
		switch ($att) {
			case 'id':
				$this->id = $value;
				break;
			case 'descricao':
				$this->descricao = $value;
				break;
			case 'titulo':
				$this->titulo = $value;
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
			
			default:
				# code...
				break;
		}
	}
	public function toArray(){
		return array(
			'id' => $this->id,
			'descricao' => $this->descricao,
			'titulo' => $this->titulo,
			'createAt' => $this->createAt,
			'updateAt' => $this->updateAt,
			'status' => $this->status
			);
	}
}