<?php
namespace Api\Model\Entity;

class Post extends \GORM\Model{
	public $id;
	public $descricao;
	public $chamada;
	public $titulo;
	public $status;
	public $createAt;
	public $updateAt;


}