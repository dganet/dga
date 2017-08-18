<?php
namespace Api\Model\Entity;

class Oportunidade extends \GORM\Model{
	public $id;
	public $status;
	public $createAt;
	public $updateAt;
	public $titulo;
	public $descricao;
	public $empresa;
	public $contratoTipo;

}