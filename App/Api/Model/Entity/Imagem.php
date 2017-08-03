<?php
namespace Api\Model\Entity;

class Imagem Extends \GORM\Model {
    public $id;
    public $path;
    public $nome;
    public $tipo;
    public $link;
    public $status;
    public $createAt;
    public $updateAt;
    
}