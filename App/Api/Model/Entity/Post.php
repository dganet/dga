<?php
namespace Api\Model\Entity;

class Post extends \GORM\Model{
	private $id;
	private $descricao;
	private $chamada;
	private $createAt;
	private $updateAt;
	private $titulo;
	private $imagem;
	private $usuario_id;

	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->id = null;
		isset($data['descricao']) ? $this->descricao = $data['descricao'] : $this->descricao = null;
		isset($data['chamada']) ? $this->chamada = $data['chamada'] : $this->chamada = null;
		isset($data['createAt']) ? $this->createAt = $data['createAt'] : $this->createAt = null;
		isset($data['updateAt']) ? $this->updateAt = $data['updateAt'] : $this->updateAt = null;
		isset($data['titulo']) ? $this->titulo = $data['titulo'] : $this->titulo = null;
		isset($data['imagem']) ? $this->imagem = $data['imagem'] : $this->imagem = null;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null;
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
		$this->class = $this;
	}
	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			case 'descricao':
				return $this->descricao;
				break;
			case 'chamada':
				return $this->chamada;
				break;
			case 'createAt':
				return $this->createAt;
				break;
			case 'updateAt':
				return $this->updateAt;
				break;
			case 'titulo':
				return $this->titulo;
				break;
			case 'imagem':
				return $this->imagem;
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
			case 'descricao':
				$this->descricao = $value;
				break;
			case 'chamada':
				$this->chamada = $value;
				break;
			case 'createAt':
				$this->createAt = $value;
				break;
			case 'updateAt':
				$this->updateAt = $value;
				break;
			case 'titulo':
				$this->titulo = $value;
				break;
			case 'imagem':
				$this->imagem = $value;
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
			'descricao' => $this->descricao,
			'chamada' => $this->chamada,
			'createAt' => $this->createAt,
			'updateAt' => $this->updateAt,
			'titulo' => $this->titulo,
			'imagem' => $this->imagem,
			'status' => $this->status,
			'usuario_id' => $this->usuario_id
			);
	}
}