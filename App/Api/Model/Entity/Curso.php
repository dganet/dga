<?php
namespace Api\Model\Entity;

class Curso extends \GORM\Model {
	public $id;
	public $titulo;
	public $descricao;
	public $createAt;
	public $updateAt;
	public $status;


}