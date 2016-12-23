<?php
namespace Api\Model\Entity;

class Oportunidade extends \GORM\Model{
	private $id;
	private $usuario_id;
	private $titulo;
	private $descricao;
	private $empresa
	private $contratoTipo;

	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->id = null;
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
		isset($data['titulo']) ? $this->titulo = $data['titulo'] : $this->titulo = null;
		isset($data['descricao']) ? $this->descricao = $data['descricao'] : $this->descricao = null;
		isset($data['empresa']) ? $this->empresa = $data['empresa'] : $this->empresa = null;
		isset($data['contratoTipo']) ? $this->contratoTipo = $data['contratoTipo'] : $this->contratoTipo = null;
		$this->class = $this;
	}
	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			case 'usuario_id':
				return $this->usuario_id;
				break;
			case 'titulo':
				return $this->titulo;
				break;
			case 'descricao':
				return $this->descricao;
				break;
			case 'empresa':
				return $this->empresa;
				break;
			case 'contratoTipo':
				return $this->contratoTipo;
				break;
			
			default:
				# code...
				break;
		}

	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
				$this->id = $value
				break;
			case 'usuario_id':
				$this->usuario_id = $value
				break;
			case 'titulo':
				$this->titulo = $value
				break;
			case 'descricao':
				$this->descricao = $value
				break;
			case 'empresa':
				$this->empresa = $value
				break;
			case 'contratoTipo':
				$this->contratoTipo = $value
				break;
			
			default:
				# code...
				break;
		}
	}
	public function toArray(){
		return array(
			'id' => $this->id,
			'usuario_id' => $this->usuario_id,
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'empresa' => $this->empresa,
			'contratoTipo' => $this->contratoTipo
			);
	}
}