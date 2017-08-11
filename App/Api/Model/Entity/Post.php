<?php
namespace Api\Model\Entity;

class Post extends \GORM\Model{
	public $id;
	public $descricao;
	public $chamada;
	public $createAt;
	public $updateAt;
	public $titulo;
	public $imagem;
	public $usuario_id;
}